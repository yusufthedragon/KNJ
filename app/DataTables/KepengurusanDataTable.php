<?php

namespace App\DataTables;

use App\Models\Kepengurusan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KepengurusanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'kepengurusans.datatables_actions')
        ->editColumn('foto', function ($kepengurusan) {
            return '<a href="'.asset('kepengurusan/foto/'.$kepengurusan->foto).'" target="_blank"><img width="50" height="50" src="'.asset('kepengurusan/foto/'.$kepengurusan->foto).'"></a>';
        })->rawColumns(['foto', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Kepengurusan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Kepengurusan $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nama',
            'jabatan',
            'pendapat',
            'foto'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'kepengurusansdatatable_' . time();
    }
}
