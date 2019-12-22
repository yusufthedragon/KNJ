<?php

namespace App\Http\Controllers;

use App\DataTables\DonasiDataTable;
use App\Http\Requests\CreateDonasiRequest;
use App\Models\Project;
use App\Repositories\DonasiRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Response;

class DonasiController extends AppBaseController
{
    /** @var  DonasiRepository */
    private $donasiRepository;

    public function __construct(DonasiRepository $donasiRepo)
    {
        $this->donasiRepository = $donasiRepo;
    }

    /**
     * Display a listing of the Donasi.
     *
     * @param DonasiDataTable $donasiDataTable
     * @return Response
     */
    public function index(DonasiDataTable $donasiDataTable)
    {
        return $donasiDataTable->render('donasi.index');
    }

    /**
     * Store a newly created Donasi in storage.
     *
     * @param CreateDonasiRequest $request
     *
     * @return Response
     */
    public function store(CreateDonasiRequest $request)
    {
        $input = $request->all();

        $bukti = $request->file('bukti_transfer');
        $buktiName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $bukti->getClientOriginalExtension();

        if (! File::isDirectory(public_path('upload/donasi/bukti'))) {
            File::makeDirectory(public_path('upload/donasi/bukti'), 0755, true);
        }

        $request->file('bukti_transfer')->move(public_path('upload/donasi/bukti'), $buktiName);

        $input['bukti_transfer'] = $buktiName;
        $input['tanggal_transfer'] = Carbon::parse($request->tanggal_transfer)->format('Y-m-d');
        $input['nominal'] = str_replace(',', '', $request->nominal);

        if ($request->jenis_donasi == 'Project') {
            $project = Project::find($request->project_id);
            $input['nama_project'] = $project->judul;
        } elseif ($request->jenis_donasi == 'Amanah') {
            $daftar_solia = array();

            foreach ($request->nomor_solia as $key => $solia) {
                $daftar_solia[$key] = [
                    'nominal' => str_replace(',', '', $request->nominal_solia[$key]),
                    'nomor' => $request->nomor_solia[$key]
                ];
            }
            
            $input['daftar_solia'] = json_encode($daftar_solia);
        }

        $donasi = $this->donasiRepository->create($input);
        $donatur = $this->donasiRepository->createDonatur($input);

        $donasi->update([
            'user_id' => $donatur->id
        ]);

        Flash::success('Donasi saved successfully.');

        return redirect(route('thanks.page'));
    }

    /**
     * Display the specified Donasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donasi = $this->donasiRepository->find($id);

        if (empty($donasi) || $donasi->status_persetujuan != 0) {
            Flash::error('Donasi not found');

            return redirect(route('donasi.index'));
        }

        return view('donasi.show')->with('donasi', $donasi);
    }

    public function approvingDonasi(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|in:-1,1'
        ]);

        $donasi = $this->donasiRepository->find($id);

        if (empty($donasi)) {
            Flash::error('Donasi not found');

            return redirect(route('donasi.index'));
        }

        $update['status_persetujuan'] = $request->status;
        $update['disetujui_oleh'] = auth()->user()->id;

        $donasi = $this->donasiRepository->update($update, $id);

        return redirect(route('donasi.index'));
    }
}
