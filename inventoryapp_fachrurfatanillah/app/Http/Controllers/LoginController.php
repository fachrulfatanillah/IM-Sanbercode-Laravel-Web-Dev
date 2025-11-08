<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users_Model;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'string'
            ],
        ], [
            'email.email' => 'Format email tidak valid.',
            'email.required' => 'email wajib diisi.',
            'password.required' => 'Username wajib diisi.',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}

// $user = Users_Model::where('email', $validatedData['email'])->first();
        // if ($user && Hash::check($validatedData['password'], $user->password)) {
        //     Auth::login($user);
        //     session(['uuid' => $user->uuid]);

        //     return redirect('/');
        // } else {
        //     return redirect()->back()
        //         ->withErrors(['login' => 'Email atau password tidak sesuai.'])
        //         ->withInput();
        // }
