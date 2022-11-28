<?php

namespace App\DataTables;

use App\Models\Student;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;

class EntrantsDataTable extends DataTable
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
            ->addColumn('action', 'entrants.action')
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-warning" data-bs-target="#staticBackdrop" onclick="complete(\'' .
                    $row->id . '\',\'' .
                    $row->name . '\',\'' .
                    $row->surname . '\',\'' .
                    $row->numdoc .
                    '\')"><i class="bi bi-check-circle-fill"></i></button>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\entrant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        return $model->newQuery()
            ->leftJoinRelationship('careers')
            ->joinRelationship('user')
            ->select([
                'users.name',
                'users.surname',
                'users.typedoc',
                'users.numdoc',
                'users.email',
                'careers.career',
                'career_student.onOld'
            ])
            ->where('career_student.onOld', '=', 0);
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
            Column::make('users.typedoc')->title('Tipo doc.')->data('typedoc'),
            Column::make('users.numdoc')->title('Documento')->data('numdoc'),
            Column::make('users.email')->title('Email')->data('email'),
            Column::make('careers.career')->title('Carrera')->data('career'),
            Column::make('action')->title('Insc. completa')
        ];
    }

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
