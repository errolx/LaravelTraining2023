<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //fetch all contacts
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //insert data
        $contact                = new Contact;
        $contact->first_name    = $data['first_name'];
        $contact->middle_name   = $data['middle_name'];
        $contact->last_name     = $data['last_name'];
        $contact->email_address = $data['email_address'];
        $contact->barangay      = $data['barangay'];
        $contact->street        = $data['street'];
        $contact->save();

        // redirect to contacts page
        //return back();
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //$contact = Contact::findorFail($id);
		return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        $data = $request->validated();

        //update data
        $contact->first_name    = $data['first_name'];
        $contact->middle_name   = $data['middle_name'];
        $contact->last_name     = $data['last_name'];
        $contact->email_address = $data['email_address'];
        $contact->barangay      = $data['barangay'];
        $contact->street        = $data['street'];
        $contact->save();

        // redirect to contacts page
        //return back();
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully updtated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
		// delete contact
		$contact->delete();
        $message = $contact->first_name . " " . $contact->last_name . "'s Contact has been successfully deleted.";
		// redirect to contact page
		return redirect()->route('contacts.index')->with('status', $message);
    }
}
