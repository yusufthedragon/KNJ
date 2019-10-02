<?php

namespace App\DataTables;

use App\Models\Donasi;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DonasiDataTable extends DataTable
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

        return $dataTable->addColumn('action', function($donasi) {
            if ($donasi->status_persetujuan == 0) {
                return '<div class="btn-group">'.
                            '<a href="'.route('donasi.show', $donasi->id).'" class="btn btn-default btn-xs">'.
                                '<i class="glyphicon glyphicon-eye-open"></i>'.
                            '</a>'.
                        '</div>';
            } else {
                return '';
            }
        })->editColumn('status_persetujuan', function($donasi) {
            if ($donasi->status_persetujuan == 0) {
                return 'Butuh Persetujuan';
            } elseif ($donasi->status_persetujuan == 1) {
                return 'Disetujui';
            } else {
                return 'Ditolak';
            }
        })->editColumn('tanggal_transfer', function($donasi) {
            return date('d-m-Y', strtotime($donasi->tanggal_transfer));
        })->editColumn('nominal', function($donasi) {
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
        return $model->newQuery()->orderBy('tanggal_transfer', 'DESC');
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
            'email',
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
}
