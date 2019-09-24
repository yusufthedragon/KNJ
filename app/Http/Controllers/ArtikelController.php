<?php

namespace App\Http\Controllers;

use App\DataTables\ArtikelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Repositories\ArtikelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ArtikelController extends AppBaseController
{
    /** @var  ArtikelRepository */
    private $artikelRepository;

    public function __construct(ArtikelRepository $artikelRepo)
    {
        $this->artikelRepository = $artikelRepo;
    }

    /**
     * Display a listing of the Artikel.
     *
     * @param ArtikelDataTable $artikelDataTable
     * @return Response
     */
    public function index(ArtikelDataTable $artikelDataTable)
    {
        return $artikelDataTable->render('artikels.index');
    }

    /**
     * Show the form for creating a new Artikel.
     *
     * @return Response
     */
    public function create()
    {
        return view('artikels.create');
    }

    /**
     * Store a newly created Artikel in storage.
     *
     * @param CreateArtikelRequest $request
     *
     * @return Response
     */
    public function store(CreateArtikelRequest $request)
    {
        $input = $request->all();

        $cover = $request->file('cover');
        $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();

        if (! File::isDirectory(public_path('cover'))) {
            File::makeDirectory(public_path('cover'), 0755, true);
        }

        $request->file('cover')->move(public_path('cover'), $coverName);

        if (! File::isDirectory(public_path('gambar'))) {
            File::makeDirectory(public_path('gambar'), 0755, true);
        }

        foreach ($input['gambar'] as $key => $gambar) {
            $gambarName[$key] = Carbon::now()->timestamp . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar'), $gambarName[$key]);
        }

        $input['cover'] = $coverName;
        $input['gambar'] = implode('|', $gambarName);

        $artikel = $this->artikelRepository->create($input);

        Flash::success('Artikel saved successfully.');

        return redirect(route('artikels.index'));
    }

    /**
     * Display the specified Artikel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $artikel = $this->artikelRepository->find($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        return view('artikels.show')->with('artikel', $artikel);
    }

    /**
     * Show the form for editing the specified Artikel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $artikel = $this->artikelRepository->find($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        return view('artikels.edit')->with('artikel', $artikel);
    }

    /**
     * Update the specified Artikel in storage.
     *
     * @param  int              $id
     * @param UpdateArtikelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArtikelRequest $request)
    {
        $artikel = $this->artikelRepository->find($id);
        dd($request->all());

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        $artikel = $this->artikelRepository->update($request->all(), $id);

        Flash::success('Artikel updated successfully.');

        return redirect(route('artikels.index'));
    }

    /**
     * Remove the specified Artikel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $artikel = $this->artikelRepository->find($id);

        if (empty($artikel)) {
            Flash::error('Artikel not found');

            return redirect(route('artikels.index'));
        }

        $this->artikelRepository->delete($id);

        Flash::success('Artikel deleted successfully.');

        return redirect(route('artikels.index'));
    }
}
