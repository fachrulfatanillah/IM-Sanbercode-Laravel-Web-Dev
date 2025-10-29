<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Register extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $firstName = $request->input('fname');
        $lastName = $request->input('lname');

        return redirect('/home')->with([
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
    }
}
