<?php

namespace App\DataTables;

use App\Exports\KepengurusanExport;
use App\Models\Kepengurusan;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class KepengurusanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'kepengurusan.datatables_actions')
        ->editColumn('foto', function ($kepengurusan) {
            return '<a href="'.asset('upload/kepengurusan/foto/'.$kepengurusan->foto).'" target="_blank"><img width="50" height="50" src="'.asset('upload/kepengurusan/foto/'.$kepengurusan->foto).'"></a>';
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
        return 'kepengurusandatatable_' . time();
    }

    /**
     * Export results to Excel file.
     *
     * @return void
     */
    public function excel()
    {
        ob_end_clean();
        ob_start();

        $kepengurusans = Kepengurusan::get();

        return Excel::download(new KepengurusanExport($kepengurusans), $this->filename().'.xlsx');
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

        $kepengurusans = Kepengurusan::get();
        $pdf = PDF::loadView('kepengurusan.pdf', get_defined_vars());

        return $pdf->download($this->filename().'.pdf');
    }
}
