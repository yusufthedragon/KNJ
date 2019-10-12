<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectExport implements FromView
{
    /**
     * Get the exported data.
     *
     * @var \App\Models\Project
     */
    private $data;

    /**
     * Set the exported data.
     *
     * @var \App\Models\Project
     */
    public function __construct($projects)
    {
        $this->data = $projects;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('project.excel', ['projects' => $this->data]);
    }
}
