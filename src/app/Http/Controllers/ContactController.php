<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }
    public function submit(ContactRequest $request)
    {
        $inputs = $request->only(['name', 'email', 'message']);

        Contact::create($inputs);


        return view('thanks',['inputs' => $inputs]);
        
    }
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));

}
}