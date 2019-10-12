<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DonasiExport implements FromView
{
    /**
     * Get the exported data.
     *
     * @var \App\Models\Donasi
     */
    private $data;

    /**
     * Set the exported data.
     *
     * @param  \App\Models\Donasi  $donasis
     */
    public function __construct($donasis)
    {
        $this->data = $donasis;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('donasi.excel', ['donasis' => $this->data]);
    }
}
