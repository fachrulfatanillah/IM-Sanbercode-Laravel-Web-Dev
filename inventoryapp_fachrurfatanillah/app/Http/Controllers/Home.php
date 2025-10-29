<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function home(Request $request)
    {
        $firstName = session('firstName');
        $lastName = session('lastName');

        return view('home', compact('firstName', 'lastName'));
    }
}
