<?php

namespace App\Http\Controllers;

use App\DataTables\ArtikelDataTable;
use App\Http\Requests\CreateArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Repositories\ArtikelRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
        return $artikelDataTable->render('artikel.index');
    }

    /**
     * Show the form for creating a new Artikel.
     *
     * @return Response
     */
    public function create()
    {
        return view('artikel.create');
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
        
        $input['highlight'] = (isset($input['highlight']) ? 1 : 0);

        $cover = $request->file('cover');
        $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();

        if (! File::isDirectory(public_path('upload/artikel/cover'))) {
            File::makeDirectory(public_path('upload/artikel/cover'), 0755, true);
        }

        $request->file('cover')->move(public_path('upload/artikel/cover'), $coverName);

        if (! File::isDirectory(public_path('upload/artikel/gallery'))) {
            File::makeDirectory(public_path('upload/artikel/gallery'), 0755, true);
        }

        foreach ($input['gallery'] as $key => $gallery) {
            $galleryName[$key] = Carbon::now()->timestamp . '_' . uniqid() . '.' . $gallery->getClientOriginalExtension();
            $gallery->move(public_path('upload/artikel/gallery'), $galleryName[$key]);
        }

        $input['cover'] = $coverName;
        $input['gallery'] = implode('|', $galleryName);
        $input['usia'] = intval($request->usia);

        $artikel = $this->artikelRepository->create($input);
        
        $this->sendPushNotification('Ada artikel baru.', 'Silakan baca artikel terbaru: '.$artikel->judul, route('artikel_detail.page', Str::slug($artikel->judul)));

        Flash::success('Artikel saved successfully.');

        return redirect(route('artikel.index'));
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

            return redirect(route('artikel.index'));
        }

        return view('artikel.show')->with('artikel', $artikel);
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

            return redirect(route('artikel.index'));
        }

        $galleries = explode('|', $artikel->gallery);

        return view('artikel.edit', get_defined_vars());
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

            return redirect(route('artikel.index'));
        }

        $input = $request->all();

        $cover = $request->file('cover');

        if ($cover !== null) {
            $this->validate($request, [
                'cover' => 'max:2048|mimes:jpg,png,jpeg'
            ]);

            $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();

            $request->file('cover')->move(public_path('upload/artikel/cover'), $coverName);
            $input['cover'] = $coverName;
            File::delete('upload/artikel/cover/' . $artikel->cover);
        }

        $galleries = explode('|', $artikel->gallery);

        if (isset($input['gallery']) && count($input['gallery'])) {
            $this->validate($request, [
                'gallery.*' => 'max:2048|mimes:jpg,png,jpeg'
            ]);

            foreach ($input['gallery'] as $key => $gallery) {
                if (isset($galleries[$key])) {
                    File::delete('upload/artikel/gallery/' . $galleries[$key]);
                }

                $galleryName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $gallery->getClientOriginalExtension();
                $gallery->move(public_path('artikel/gallery'), $galleryName);
                $galleries[$key] = $galleryName;
            }
        }

        foreach ($input['delete_gallery'] as $key => $delete_gallery) {
            if ($delete_gallery == "true" && $key > 0) {
                File::delete('upload/artikel/gallery/' . $galleries[$key]);
                unset($galleries[$key]);
            }
        }

        $input['gallery'] = implode('|', $galleries);
        $input['usia'] = intval($request->usia);

        $artikel = $this->artikelRepository->update($input, $id);

        Flash::success('Artikel updated successfully.');

        return redirect(route('artikel.index'));
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

            return redirect(route('artikel.index'));
        }

        $this->artikelRepository->delete($id);

        Flash::success('Artikel deleted successfully.');

        return redirect(route('artikel.index'));
    }
}
