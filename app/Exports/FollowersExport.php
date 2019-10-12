<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FollowersExport implements FromView
{
    /**
     * Get the exported data.
     *
     * @var \App\Models\User
     */
    private $data;

    /**
     * Set the exported data.
     *
     * @param  \App\Models\User  $followers
     */
    public function __construct($followers)
    {
        $this->data = $followers;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('followers.excel', ['followers' => $this->data]);
    }
}
