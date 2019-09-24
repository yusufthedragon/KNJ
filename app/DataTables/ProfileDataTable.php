<?php

namespace App\DataTables;

use App\Models\Profile;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ProfileDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'profiles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Profile $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Profile $model)
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
        $data = Profile::first();

        if ($data !== null) {
            $buttons = [
                ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            ];
        } else {
            $buttons = [
                ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            ];
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => $buttons,
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
            'deskripsi',
            'sejarah',
            'aktivitas',
            'visi_misi',
            'kepengurusan'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'profilesdatatable_' . time();
    }
}
