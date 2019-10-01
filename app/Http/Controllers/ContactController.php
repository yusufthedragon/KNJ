<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Repositories\ContactRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactController extends AppBaseController
{
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param ContactDataTable $contactDataTable
     * @return Response
     */
    public function index(ContactDataTable $contactDataTable)
    {
        return $contactDataTable->render('contact.index');
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();

        $contact = $this->contactRepository->create($input);

        Flash::success('Contact saved successfully.');

        return redirect(route('contact.index'));
    }

    /**
     * Display the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->find($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contact.index'));
        }

        return view('contact.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->find($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contact.index'));
        }

        return view('contact.edit')->with('contact', $contact);
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  int              $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        $contact = $this->contactRepository->find($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contact.index'));
        }

        $contact = $this->contactRepository->update($request->all(), $id);

        Flash::success('Contact updated successfully.');

        return redirect(route('contact.index'));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->find($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contact.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contact.index'));
    }
}
