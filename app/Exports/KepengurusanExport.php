<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KepengurusanExport implements FromView
{
    /**
     * Get the exported data.
     *
     * @var \App\Models\Kepengurusan
     */
    private $data;

    /**
     * Set the exported data.
     *
     * @var \App\Models\Kepengurusan
     */
    public function __construct($kepengurusans)
    {
        $this->data = $kepengurusans;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('kepengurusan.excel', ['kepengurusans' => $this->data]);
    }
}
