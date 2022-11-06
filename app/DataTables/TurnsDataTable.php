<?php

namespace App\DataTables;

use App\Models\Turn;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

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
            ->addColumn('student', function ($row) {
                if ($row->student && $row->student->user) {
                    return $row->student->user->name . ' ' . $row->student->user->surname;
                } else {
                    return '';
                }
            })
            ->addColumn('doc', function ($row) {
                if ($row->student && $row->student->user) {
                    return $row->student->user->numdoc;
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($row) {
                return '<a class="btn btn-warning" href="/administracion/turnos/editar/' . $row->id . '">
                            <i class="bi bi-pencil-fill"></i>
                        </a><a class="btn btn-danger" href="/administracion/turnos/eliminar/' . $row->id . '">
                            <i class="bi bi-trash-fill"></i></a>';
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
        return $model->with('student')->where('student_id', '<>', null)->newQuery();
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
            Column::make('student')->title('Estudiante'),
            Column::make('doc')->title('Documento'),
            Column::make('date'),
            Column::make('time'),
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
    protected function filename()
    {
        return 'entrants_' . date('YmdHis');
    }
}
