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
