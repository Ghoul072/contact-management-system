<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contacts', ['contacts' => $contacts]);
    }

    public function create() {
        return view('create_contact');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        Contact::create($validated);
        return redirect()->route('contacts.index')->with('success','Successfully added contact');
    }
}
