<?php

namespace App\DataTables;

use App\Exports\FollowersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class FollowersDataTable extends DataTable
{
    /**
     * Overload default action method from DataTable.
     *
     * @var array
     */
    protected $actions = ['print', 'reset', 'reload', 'excel', 'pdf', 'csv'];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'followers.datatables_actions')
        ->editColumn('foto', function ($followers) {
            return '<a href="'.asset('upload/followers/foto/'.$followers->foto).'" target="_blank"><img width="50" height="50" src="'.asset('upload/followers/foto/'.$followers->foto).'"></a>';
        })->rawColumns(['foto', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->where('role', 'followers');
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
            'nama',
            'email',
            'no_telepon',
            'domisili',
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
        return 'followersdatatable_' . time();
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

        $followers = User::where('role', 'followers')->get();

        return Excel::download(new FollowersExport($followers), $this->filename().'.xlsx');
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

        $followers = User::where('role', 'followers')->get();
        $pdf = PDF::loadView('followers.pdf', get_defined_vars());

        return $pdf->download($this->filename().'.pdf');
    }
}
