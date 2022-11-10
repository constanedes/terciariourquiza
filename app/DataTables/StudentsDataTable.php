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

class StudentsDataTable extends DataTable
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
            ->addColumn('action', 'action')
            ->filter(function ($query) {
                if (request()->has('careers.career')) {
                    $query->where('career', 'like', "%" . request('career') . "%");
                }
            }, true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        return $model
            ->leftJoinRelationship('careers')
            ->joinRelationship('user')
            ->select([
                'students.*',
                'careers.career',
                'users.name',
                'users.surname',
                'users.email',
                'users.typedoc',
                'users.numdoc',
                'career_student.year'
            ])->where('completePreinscription', '=', true)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('students-table')
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
            Column::make('users.name')->title('Nombres')->data('name'),
            Column::make('users.surname')->title('Apellidos')->data('surname'),
            Column::make('users.typedoc')->title('Tipo documento')->data('typedoc'),
            Column::make('users.numdoc')->title('Documento')->data('numdoc'),
            Column::make('users.email')->title('Email')->data('email'),
            Column::make('careers.career')->title('Carrera')->data('career'),
            Column::make('career_student.year')->title('Año')->data('year'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Students_' . date('YmdHis');
    }
}
