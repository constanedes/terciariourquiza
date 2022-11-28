<?php

namespace App\DataTables;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;

class TurnsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            /*->addColumn('name', function ($row) {
                if ($row->student) {
                    return $row->student->user ? $row->student->user->name : '';
                }
                return '';
            }, true)*/
            /*
            ->addColumn('doc', function ($row) {
                if ($row->student && $row->student->user) {
                    return $row->student->user->numdoc;
                } else {
                    return null;
                }
            })*/
            ->addColumn('action', function ($row) {
                if ($row->name == null) {
                    return '<a class="btn btn-danger" onclick="eliminar(\'' . $row->id . '\',\'' . $row->date . '\',\'' . $row->time . '\')">
                            <i class="bi bi-trash-fill"></i></a>';
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\entrant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function query(Turn $model)
    {
        return $model
            ->leftJoinRelationship('student', function ($join) {
                $join->where('completePreinscription', '=', false);
            })
            ->leftJoinRelationship('student.user')
            ->select([
                //    'student.id',
                'turns.*',
                'users.name',
                'users.surname',
                'users.email'
            ])
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('entrants-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make(['extend' => 'create', 'text' => 'Crear']),
                Button::make(['extend' => 'excel', 'text' => 'Excel']),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('users.name')->title('Nombre')->data('name'),
            Column::make('users.surname')->title('Apellido')->data('surname'),
            Column::make('users.email')->title('Email')->data('email'),
            Column::make('date')->title('Fecha'),
            Column::make('time')->title('Hora'),
            Column::make('careers_concat')->title('Carreras')->sortable(false)->searchable(false),
            Column::make('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }
    //'<button class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>'
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'entrants_' . date('YmdHis');
    }
}
