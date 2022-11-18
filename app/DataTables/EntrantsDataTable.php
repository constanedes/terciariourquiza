<?php

namespace App\DataTables;

use App\Models\Turn;
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
                    $row->student->id . '\',\'' .
                    $row->student->user->name . '\',\'' .
                    $row->student->user->surname . '\',\'' .
                    $row->student->user->numdoc .
                    '\')"><i class="bi bi-check-circle-fill"></i></button>';
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
        return $model->newQuery()
            ->leftJoinRelationship('student', function ($join) {
                $join->where('completePreinscription', '=', false);
            })
            ->leftJoinRelationship('student.careers')
            ->joinRelationship('student.user')
            ->select([
                'turns.date',
                'turns.time',
                'users.name',
                'users.surname',
                'users.typedoc',
                'users.numdoc',
                'users.email',
                'careers.career'
            ])
            /*->where('student_id', '<>', null)
            ->whereHas('student', function (Builder $query) {
                $query->where('completePreinscription', '=', 0);
            })
            ->whereHas('student.careers', function (Builder $query) {
                $query->where('year', '=', Setting::select('obs')->where('name', '=', 'inscripcion')->first()->obs);
            })*/;

        /*->with([
                'student',
                'student.user',
                'student.careers'
            ])->select('turns.*')
            ->where('student_id', '<>', null)
            ->whereHas('student', function (Builder $query) {
                $query->where('completePreinscription', '=', 0);
            })
            ->whereHas('student.careers', function (Builder $query) {
                $query->where('year', '=', Setting::select('obs')->where('name', '=', 'inscripcion')->first()->obs);
            });*/
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
            Column::make('users.name')->title('Nombre')->data('users.name'),
            Column::make('users.surname')->title('Apellido')->data('users.surname'),
            Column::make('users.typedoc')->title('Tipo documento')->data('users.typedoc'),
            Column::make('users.numdoc')->title('Documento')->data('users.numdoc'),
            Column::make('users.email')->title('Email')->data('users.email'),
            Column::make('careers.career')->title('Carrera')->data('careers.career'),
            Column::make('date')->title('Fecha')->data('date'),
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
