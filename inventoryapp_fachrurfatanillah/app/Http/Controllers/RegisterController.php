<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users_Model;

class RegisterController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:100|unique:Users,Email',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]+$/'
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'password.regex' => 'Password harus mengandung huruf dan angka.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        $user = Users_Model::create([
            'Username' => $validatedData['username'],
            'Email' => $validatedData['email'],
            'Password' => Hash::make($validatedData['password']),
            'Status' => 'staf',
        ]);
        if ($user) {
            return redirect('/home')->with([
                'uuid' => $user->uuid,
            ]);
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data user.');
        }
    }
}
