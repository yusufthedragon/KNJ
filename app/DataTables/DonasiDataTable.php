<?php

namespace App\DataTables;

use App\Exports\DonasiExport;
use App\Models\Donasi;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class DonasiDataTable extends DataTable
{
    /**
     * Overload default action method from DataTable.
     *
     * @var array
     */
    protected $actions = ['print', 'reset', 'reload', 'excel', 'pdf'];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addIndexColumn()->addColumn('action', function ($donasi) {
            if ($donasi->status_persetujuan == 0) {
                return '<div class="btn-group">'.
                            '<a href="'.route('donasi.show', $donasi->id).'" class="btn btn-default btn-xs">'.
                                '<i class="glyphicon glyphicon-eye-open"></i>'.
                            '</a>'.
                        '</div>';
            } else {
                return '';
            }
        })->editColumn('status_persetujuan', function ($donasi) {
            if ($donasi->status_persetujuan == 0) {
                return 'Belum Verifikasi';
            } elseif ($donasi->status_persetujuan == 1) {
                return 'Sesuai ('.($donasi->admin->nama ?? '').')';
            } else {
                return 'Tidak Sesuai ('.($donasi->admin->nama ?? '').')';
            }
        })->editColumn('tanggal_transfer', function ($donasi) {
            return date('d-m-Y', strtotime($donasi->tanggal_transfer));
        })->editColumn('nominal', function ($donasi) {
            return "Rp".number_format($donasi->nominal, 0, ',', ',');
        })->editColumn('bukti_transfer', function ($donasi) {
            return '<a href="'.asset('upload/donasi/bukti/'.$donasi->bukti_transfer).'" target="_blank"><img width="50" height="50" src="'.asset('upload/donasi/bukti/'.$donasi->bukti_transfer).'"></a>';
        })->rawColumns(['bukti_transfer', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Donasi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Donasi $model)
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
                'order' => [[5, 'desc']],
                'buttons' => [
                    [
                        'extend' => 'collection',
                        'text' => '<i class="fa fa-download"></i> Export&nbsp;<span class="caret"></span>',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'buttons' => ['excel', 'pdf']
                    ],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
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
            [
                'data' => 'DT_RowIndex',
                'name' => 'DT_RowIndex',
                'title' => 'No.',
                'orderable' => false,
                'searchable' => false
            ],
            'nama',
            'email',
            'no_telepon',
            'jenis_donasi',
            'tanggal_transfer',
            'bukti_transfer',
            'nominal',
            'status_persetujuan'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'donasidatatable_' . time();
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

        $donasis = Donasi::orderBy('tanggal_transfer', 'DESC')->get();

        return Excel::download(new DonasiExport($donasis), $this->filename().'.xlsx');
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

        $donasis = Donasi::orderBy('tanggal_transfer', 'DESC')->get();
        $pdf = PDF::loadView('donasi.pdf', get_defined_vars());

        return $pdf->download($this->filename().'.pdf');
    }
}
