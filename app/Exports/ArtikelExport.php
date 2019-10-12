<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArtikelExport implements FromView
{
    /**
     * Get the exported data.
     *
     * @var \App\Models\Artikel
     */
    private $data;

    /**
     * Set the exported data.
     *
     * @param  \App\Models\Artikel  $artikels
     */
    public function __construct($artikels)
    {
        $this->data = $artikels;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('artikel.excel', ['artikels' => $this->data]);
    }
}
