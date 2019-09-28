<?php

namespace App\Http\Controllers;

use App\DataTables\FollowersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFollowersRequest;
use App\Http\Requests\UpdateFollowersRequest;
use App\Repositories\FollowersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FollowersController extends AppBaseController
{
    /** @var  FollowersRepository */
    private $followersRepository;

    public function __construct(FollowersRepository $followersRepo)
    {
        $this->followersRepository = $followersRepo;
    }

    /**
     * Display a listing of the Followers.
     *
     * @param FollowersDataTable $followersDataTable
     * @return Response
     */
    public function index(FollowersDataTable $followersDataTable)
    {
        return $followersDataTable->render('followers.index');
    }

    /**
     * Show the form for creating a new Followers.
     *
     * @return Response
     */
    public function create()
    {
        return view('followers.create');
    }

    /**
     * Store a newly created Followers in storage.
     *
     * @param CreateFollowersRequest $request
     *
     * @return Response
     */
    public function store(CreateFollowersRequest $request)
    {
        $input = $request->all();

        $followers = $this->followersRepository->create($input);

        Flash::success('Followers saved successfully.');

        return redirect(route('followers.index'));
    }

    /**
     * Display the specified Followers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $followers = $this->followersRepository->find($id);

        if (empty($followers)) {
            Flash::error('Followers not found');

            return redirect(route('followers.index'));
        }

        return view('followers.show')->with('followers', $followers);
    }

    /**
     * Show the form for editing the specified Followers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $followers = $this->followersRepository->find($id);

        if (empty($followers)) {
            Flash::error('Followers not found');

            return redirect(route('followers.index'));
        }

        return view('followers.edit')->with('followers', $followers);
    }

    /**
     * Update the specified Followers in storage.
     *
     * @param  int              $id
     * @param UpdateFollowersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFollowersRequest $request)
    {
        $followers = $this->followersRepository->find($id);

        if (empty($followers)) {
            Flash::error('Followers not found');

            return redirect(route('followers.index'));
        }

        $followers = $this->followersRepository->update($request->all(), $id);

        Flash::success('Followers updated successfully.');

        return redirect(route('followers.index'));
    }

    /**
     * Remove the specified Followers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $followers = $this->followersRepository->find($id);

        if (empty($followers)) {
            Flash::error('Followers not found');

            return redirect(route('followers.index'));
        }

        $this->followersRepository->delete($id);

        Flash::success('Followers deleted successfully.');

        return redirect(route('followers.index'));
    }
}
