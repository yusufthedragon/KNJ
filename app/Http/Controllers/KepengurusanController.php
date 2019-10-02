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
        return $kepengurusanDataTable->render('kepengurusan.index');
    }

    /**
     * Show the form for creating a new Kepengurusan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kepengurusan.create');
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

        if (! File::isDirectory(public_path('upload/kepengurusan/foto'))) {
            File::makeDirectory(public_path('upload/kepengurusan/foto'), 0755, true);
        }

        $request->file('foto')->move(public_path('upload/kepengurusan/foto'), $fotoName);
        $input['foto'] = $fotoName;

        $kepengurusan = $this->kepengurusanRepository->create($input);

        Flash::success('Kepengurusan saved successfully.');

        return redirect(route('kepengurusan.index'));
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

            return redirect(route('kepengurusan.index'));
        }

        return view('kepengurusan.show')->with('kepengurusan', $kepengurusan);
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

            return redirect(route('kepengurusan.index'));
        }

        return view('kepengurusan.edit')->with('kepengurusan', $kepengurusan);
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

            return redirect(route('kepengurusan.index'));
        }

        $input = $request->all();

        $foto = $request->file('foto');

        if ($foto !== null) {
            $fotoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $input['foto'] = $fotoName;
            $request->file('foto')->move(public_path('upload/kepengurusan/foto'), $fotoName);
            File::delete('upload/kepengurusan/foto' . $kepengurusan->gambar);
        }

        $kepengurusan = $this->kepengurusanRepository->update($input, $id);

        Flash::success('Kepengurusan updated successfully.');

        return redirect(route('kepengurusan.index'));
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

            return redirect(route('kepengurusan.index'));
        }

        $this->kepengurusanRepository->delete($id);

        Flash::success('Kepengurusan deleted successfully.');

        return redirect(route('kepengurusan.index'));
    }
}
