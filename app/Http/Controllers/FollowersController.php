<?php

namespace App\Http\Controllers;

use App\DataTables\FollowersDataTable;
use App\Http\Requests;
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
