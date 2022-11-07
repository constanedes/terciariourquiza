<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

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
                    $row->user->name . '\',\'' .
                    $row->user->surname . '\',\'' .
                    $row->user->numdoc .
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
        return $model->with(['user'])->select('students.*')->where('completePreinscription', '=', 0)->newQuery();
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
                Button::make('create'),
                Button::make('export'),
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
            Column::make('user.name')->title('Nombre')->data('user.name'),
            Column::make('user.surname')->title('Apellido')->data('user.surname'),
            Column::make('user.typedoc')->title('Tipo documento')->data('user.typedoc'),
            Column::make('user.numdoc')->title('Documento')->data('user.numdoc'),
            Column::make('user.email')->title('Email')->data('user.email'),
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
