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
        return $aboutUsDataTable->render('aboutuses.index');
    }

    /**
     * Show the form for creating a new AboutUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('aboutuses.create');
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

        if (! File::isDirectory(public_path('about_us/gambar'))) {
            File::makeDirectory(public_path('about_us/gambar'), 0755, true);
        }

        $request->file('gambar')->move(public_path('about_us/gambar'), $coverName);
        $input['gambar'] = $coverName;

        $aboutUs = $this->aboutUsRepository->create($input);

        Flash::success('About Us saved successfully.');

        return redirect(route('aboutuses.index'));
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
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.show')->with('aboutUs', $aboutUs);
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
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.edit')->with('aboutUs', $aboutUs);
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
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $input = $request->all();

        $gambar = $request->file('gambar');

        if ($gambar !== null) {
            $gambarName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $input['gambar'] = $gambarName;
            $request->file('gambar')->move(public_path('about_us/gambar/'), $gambarName);
            File::delete('about_us/gambar/' . $aboutUs->gambar);
        }

        $aboutUs = $this->aboutUsRepository->update($input, $id);

        Flash::success('About Us updated successfully.');

        return redirect(route('aboutuses.index'));
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
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $this->aboutUsRepository->delete($id);

        Flash::success('About Us deleted successfully.');

        return redirect(route('aboutuses.index'));
    }
}
