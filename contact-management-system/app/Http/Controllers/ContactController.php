<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

validator::extend("phone", function ($attribute, $value, $parameters, $validator) {
    return preg_match("/^\d{10}$/", $value);
});

Validator::replacer("phone", function ($message, $attribute, $rule, $parameters) {
    return str_replace('validation.phone', 'The :attribute must be a 10-digit phone number.', $message);
});

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' =>'required',
            'last_name'=> 'required',
            'phone'=> 'nullable|phone',
            'email'=> 'nullable|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        };
        $contact = Contact::create($request->all());
        return response()->json(['message' =>'Contact created successfully', 'contact' => $contact], 201);
    }

    public function show($id) {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function update(Request $request, $id) {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message'=> 'Contact Not Found'],404);
        }

        $validator = Validator::make($request->all(), [
            'first_name' =>'required',
            'last_name'=> 'required',
            'phone'=> 'nullable|phone',
            'email'=> 'nullable|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        };

        $contact->update($request->all());

        return response()->json(['message'=> 'Contact updated successfully','Contact'=> $contact], 200);
    }

    public function destroy($id) {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message'=> 'Contact Not Found'],404);
        };
        $contact->delete();
        return response()->json(['message'=> 'Contact deleted successfully'], 204);
    }
}
