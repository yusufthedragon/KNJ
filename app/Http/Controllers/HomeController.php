<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Donasi::sum('nominal');
        $biasa = Donasi::where('jenis_donasi', 'Biasa')->where('status_persetujuan', 1)->sum('nominal');
        $amanah = Donasi::where('jenis_donasi', 'Amanah')->where('status_persetujuan', 1)->sum('nominal');
        $project = Donasi::where('jenis_donasi', 'Project')->where('status_persetujuan', 1)->sum('nominal');
        $unverified = Donasi::where('status_persetujuan', '0')->sum('nominal');

        return view('home', get_defined_vars());
    }
}
