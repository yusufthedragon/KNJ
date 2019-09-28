<?php

namespace App\Http\Controllers;

use App\DataTables\KepengurusanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKepengurusanRequest;
use App\Http\Requests\UpdateKepengurusanRequest;
use App\Repositories\KepengurusanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class KepengurusanController extends AppBaseController
{
    /** @var  KepengurusanRepository */
    private $kepengurusanRepository;

    public function __construct(KepengurusanRepository $kepengurusanRepo)
    {
        $this->kepengurusanRepository = $kepengurusanRepo;
    }

    /**
     * Display a listing of the Kepengurusan.
     *
     * @param KepengurusanDataTable $kepengurusanDataTable
     * @return Response
     */
    public function index(KepengurusanDataTable $kepengurusanDataTable)
    {
        return $kepengurusanDataTable->render('kepengurusans.index');
    }

    /**
     * Show the form for creating a new Kepengurusan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kepengurusans.create');
    }

    /**
     * Store a newly created Kepengurusan in storage.
     *
     * @param CreateKepengurusanRequest $request
     *
     * @return Response
     */
    public function store(CreateKepengurusanRequest $request)
    {
        $input = $request->all();

        $foto = $request->file('foto');
        $fotoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

        if (! File::isDirectory(public_path('kepengurusan/foto'))) {
            File::makeDirectory(public_path('kepengurusan/foto'), 0755, true);
        }

        $request->file('foto')->move(public_path('kepengurusan/foto'), $fotoName);
        $input['foto'] = $fotoName;

        $kepengurusan = $this->kepengurusanRepository->create($input);

        Flash::success('Kepengurusan saved successfully.');

        return redirect(route('kepengurusans.index'));
    }

    /**
     * Display the specified Kepengurusan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kepengurusan = $this->kepengurusanRepository->find($id);

        if (empty($kepengurusan)) {
            Flash::error('Kepengurusan not found');

            return redirect(route('kepengurusans.index'));
        }

        return view('kepengurusans.show')->with('kepengurusan', $kepengurusan);
    }

    /**
     * Show the form for editing the specified Kepengurusan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kepengurusan = $this->kepengurusanRepository->find($id);

        if (empty($kepengurusan)) {
            Flash::error('Kepengurusan not found');

            return redirect(route('kepengurusans.index'));
        }

        return view('kepengurusans.edit')->with('kepengurusan', $kepengurusan);
    }

    /**
     * Update the specified Kepengurusan in storage.
     *
     * @param  int              $id
     * @param UpdateKepengurusanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKepengurusanRequest $request)
    {
        $kepengurusan = $this->kepengurusanRepository->find($id);

        if (empty($kepengurusan)) {
            Flash::error('Kepengurusan not found');

            return redirect(route('kepengurusans.index'));
        }

        $input = $request->all();

        $foto = $request->file('foto');

        if ($foto !== null) {
            $fotoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $input['foto'] = $fotoName;
            $request->file('foto')->move(public_path('kepengurusan/foto'), $fotoName);
            File::delete('kepengurusan/foto' . $kepengurusan->gambar);
        }

        $kepengurusan = $this->kepengurusanRepository->update($input, $id);

        Flash::success('Kepengurusan updated successfully.');

        return redirect(route('kepengurusans.index'));
    }

    /**
     * Remove the specified Kepengurusan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kepengurusan = $this->kepengurusanRepository->find($id);

        if (empty($kepengurusan)) {
            Flash::error('Kepengurusan not found');

            return redirect(route('kepengurusans.index'));
        }

        $this->kepengurusanRepository->delete($id);

        Flash::success('Kepengurusan deleted successfully.');

        return redirect(route('kepengurusans.index'));
    }
}
