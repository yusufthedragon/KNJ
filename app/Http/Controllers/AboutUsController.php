<?php

namespace App\Http\Controllers;

use App\DataTables\AboutUsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Repositories\AboutUsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AboutUsController extends AppBaseController
{
    /** @var  AboutUsRepository */
    private $aboutUsRepository;

    public function __construct(AboutUsRepository $aboutUsRepo)
    {
        $this->aboutUsRepository = $aboutUsRepo;
    }

    /**
     * Display a listing of the AboutUs.
     *
     * @param AboutUsDataTable $aboutUsDataTable
     * @return Response
     */
    public function index(AboutUsDataTable $aboutUsDataTable)
    {
        return $aboutUsDataTable->render('about_us.index');
    }

    /**
     * Show the form for creating a new AboutUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('about_us.create');
    }

    /**
     * Store a newly created AboutUs in storage.
     *
     * @param CreateAboutUsRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutUsRequest $request)
    {
        $input = $request->all();

        $cover = $request->file('gambar');
        $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();

        if (! File::isDirectory(public_path('upload/about_us/gambar'))) {
            File::makeDirectory(public_path('upload/about_us/gambar'), 0755, true);
        }

        $request->file('gambar')->move(public_path('upload/about_us/gambar'), $coverName);
        $input['gambar'] = $coverName;

        $aboutUs = $this->aboutUsRepository->create($input);

        Flash::success('Tentang Kami saved successfully.');

        return redirect(route('about_us.index'));
    }

    /**
     * Display the specified AboutUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('Tentang Kami not found');

            return redirect(route('about_us.index'));
        }

        return view('about_us.show')->with('aboutUs', $aboutUs);
    }

    /**
     * Show the form for editing the specified AboutUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('Tentang Kami not found');

            return redirect(route('about_us.index'));
        }

        return view('about_us.edit')->with('aboutUs', $aboutUs);
    }

    /**
     * Update the specified AboutUs in storage.
     *
     * @param  int              $id
     * @param UpdateAboutUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutUsRequest $request)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('Tentang Kami not found');

            return redirect(route('about_us.index'));
        }

        $input = $request->all();

        $gambar = $request->file('gambar');

        if ($gambar !== null) {
            $gambarName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $input['gambar'] = $gambarName;
            $request->file('gambar')->move(public_path('upload/about_us/gambar/'), $gambarName);
            File::delete('upload/about_us/gambar/' . $aboutUs->gambar);
        }

        $aboutUs = $this->aboutUsRepository->update($input, $id);

        Flash::success('Tentang Kami updated successfully.');

        return redirect(route('about_us.index'));
    }

    /**
     * Remove the specified AboutUs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('Tentang Kami not found');

            return redirect(route('about_us.index'));
        }

        $this->aboutUsRepository->delete($id);

        Flash::success('Tentang Kami deleted successfully.');

        return redirect(route('about_us.index'));
    }
}
