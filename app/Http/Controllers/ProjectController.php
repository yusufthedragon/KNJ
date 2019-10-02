<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     * @return Response
     */
    public function index(ProjectDataTable $projectDataTable)
    {
        return $projectDataTable->render('project.index');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $cover = $request->file('cover');
        $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
        $input['cover'] = $coverName;

        if (! File::isDirectory(public_path('upload/project/cover'))) {
            File::makeDirectory(public_path('upload/project/cover'), 0755, true);
        }

        $request->file('cover')->move(public_path('upload/project/cover'), $coverName);

        $project = $this->projectRepository->create($input);

        Flash::success('Project saved successfully.');

        return redirect(route('project.index'));
    }

    /**
     * Display the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('project.index'));
        }

        return view('project.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('project.index'));
        }

        return view('project.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param  int              $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('project.index'));
        }

        $input = $request->all();

        $cover = $request->file('cover');

        if ($cover !== null) {
            $coverName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
            $input['cover'] = $coverName;
            $request->file('cover')->move(public_path('upload/project/cover'), $coverName);
            File::delete('upload/project/cover/' . $project->cover);
        }

        $project = $this->projectRepository->update($input, $id);

        Flash::success('Project updated successfully.');

        return redirect(route('project.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('project.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('project.index'));
    }
}
