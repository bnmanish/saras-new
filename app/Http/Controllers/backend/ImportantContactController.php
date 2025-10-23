<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantContact;
use Session;

class ImportantContactController extends Controller
{
    public function listContacts(){
        $data = ImportantContact::orderBy('created_at', 'desc')->get();
        return view('backend/important_contacts/list_important_contacts')->with(['data' => $data]);
    }

    public function addContact(){
        return view('backend/important_contacts/add_important_contact');
    }

    public function storeContact(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'landline' => 'nullable|string|max:20',
            'mobile_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        ImportantContact::create($request->all());

        Session::flash('success', 'Important Contact added successfully!');
        return redirect()->route('admin.list.important_contacts');
    }

    public function editContact($id){
        $data = ImportantContact::findOrFail($id);
        return view('backend/important_contacts/edit_important_contact', compact('data'));
    }

    public function updateContact(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'landline' => 'nullable|string|max:20',
            'mobile_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        $contact = ImportantContact::findOrFail($id);
        $contact->update($request->all());

        Session::flash('success', 'Important Contact updated successfully!');
        return redirect()->route('admin.list.important_contacts');
    }

    public function deleteContact($id){
        $contact = ImportantContact::findOrFail($id);
        $contact->delete();

        Session::flash('success', 'Important Contact deleted successfully!');
        return redirect()->route('admin.list.important_contacts');
    }
}
