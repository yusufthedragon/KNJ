<?php

namespace App\Http\Controllers;

use App\DataTables\DonasiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDonasiRequest;
use App\Http\Requests\UpdateDonasiRequest;
use App\Repositories\DonasiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
        return $donasiDataTable->render('donasis.index');
    }

    /**
     * Show the form for creating a new Donasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('donasis.create');
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

        $donasi = $this->donasiRepository->create($input);

        Flash::success('Donasi saved successfully.');

        return redirect(route('donasis.index'));
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

        if (empty($donasi)) {
            Flash::error('Donasi not found');

            return redirect(route('donasis.index'));
        }

        return view('donasis.show')->with('donasi', $donasi);
    }

    /**
     * Show the form for editing the specified Donasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donasi = $this->donasiRepository->find($id);

        if (empty($donasi)) {
            Flash::error('Donasi not found');

            return redirect(route('donasis.index'));
        }

        return view('donasis.edit')->with('donasi', $donasi);
    }

    /**
     * Update the specified Donasi in storage.
     *
     * @param  int              $id
     * @param UpdateDonasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonasiRequest $request)
    {
        $donasi = $this->donasiRepository->find($id);

        if (empty($donasi)) {
            Flash::error('Donasi not found');

            return redirect(route('donasis.index'));
        }

        $donasi = $this->donasiRepository->update($request->all(), $id);

        Flash::success('Donasi updated successfully.');

        return redirect(route('donasis.index'));
    }

    /**
     * Remove the specified Donasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donasi = $this->donasiRepository->find($id);

        if (empty($donasi)) {
            Flash::error('Donasi not found');

            return redirect(route('donasis.index'));
        }

        $this->donasiRepository->delete($id);

        Flash::success('Donasi deleted successfully.');

        return redirect(route('donasis.index'));
    }
}
