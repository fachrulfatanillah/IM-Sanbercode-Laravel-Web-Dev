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

        $user = Users_Model::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            return redirect('/home')->with([
                'uuid' => $user->uuid,
            ]);
        } else {
            return redirect()->back()
                ->withErrors(['login' => 'Email atau password tidak sesuai.'])
                ->withInput();
        }
    }
}
