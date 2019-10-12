<?php

namespace App\DataTables;

use App\Models\Divisi;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class DivisiDataTable extends DataTable
{
    /**
     * Overload default action method from DataTable.
     *
     * @var array
     */
    protected $actions = ['create', 'print', 'reset', 'reload', 'excel', 'pdf'];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'divisi.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Divisi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Divisi $model)
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
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    [
                        'extend' => 'collection',
                        'text' => '<i class="fa fa-download"></i> Export&nbsp;<span class="caret"></span>',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'buttons' => ['excel', 'pdf']
                    ],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ]
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
            'nama'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'divisidatatable_' . time();
    }

    /**
     * Export results to PDF file.
     *
     * @return void
     */
    public function pdf()
    {
        ob_end_clean();
        ob_start();

        $divisis = Divisi::get();
        $pdf = PDF::loadView('divisi.pdf', get_defined_vars());

        return $pdf->download($this->filename().'.pdf');
    }
}
