<?php

namespace App\DataTables;

use App\Models\AboutUs;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AboutUsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'aboutuses.datatables_actions')
        ->editColumn('gambar', function ($aboutUs) {
            return '<a href="'.asset('about_us/gambar/'.$aboutUs->gambar).'" target="_blank"><img width="50" height="50" src="'.asset('about_us/gambar/'.$aboutUs->gambar).'"></a>';
        })->rawColumns(['gambar', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AboutUs $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AboutUs $model)
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
            'judul',
            'deskripsi',
            'gambar'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'aboutusesdatatable_' . time();
    }
}
