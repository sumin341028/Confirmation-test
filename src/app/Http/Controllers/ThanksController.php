<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThanksController extends Controller
{
    public function index(Request $request)
    {
        return view('contacts.thanks');
    }
}
    //

