<?php

namespace App\DataTables;

use App\Models\Career;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CareersDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-warning" href="/administracion/carreras/editar/' . $row->id . '">
                            <i class="bi bi-pencil-fill"></i>
                        </a><a class="btn btn-danger" onclick="eliminar(\'' . $row->id . '\',\'' . $row->career . '\')">
                            <i class="bi bi-trash-fill"></i></a>
                        <a class="btn btn-success" onclick="openCupoModal(\'' . $row->id . '\',\'' . $row->career . '\',\'' . $row->quota . '\')">
                            <i class="bi bi-clipboard2-plus-fill"></i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\entrant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Career $model)
    {
        return $model->newQuery();
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
                //Button::make('create'),
                Button::make(['extend' => 'create', 'text' => 'Crear']),
                Button::make(['extend' => 'export', 'text' => 'Exportar']),
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
            Column::make('career')->title('Carrera'),
            Column::make('desc')->title('Descripcion'),
            Column::make('desc_corta')->title('Desc. corta'),
            Column::make('quota')->title('Cupo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
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
