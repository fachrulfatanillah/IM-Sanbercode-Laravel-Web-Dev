<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        return view('/login');
    }

    public function index()
    {
        return view('products.tampil');
    }
}
