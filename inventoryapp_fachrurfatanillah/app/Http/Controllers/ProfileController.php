<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile.profile');
    }

    public function edit()
    {
        return view('profile.editProfile');
    }

    public function changePassword()
    {
        return view('profile.changePassword');
    }
}
