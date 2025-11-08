<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_Model;
use App\Models\Profile_Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $userAuth = Auth::user();

        $userData = Users_Model::with('profile')->where('uuid', $userAuth->uuid)->firstOrFail();

        return view('profile.profile', compact('userData'));
    }

    public function edit()
    {
        $userAuth = Auth::user();

        $userData = Users_Model::with('profile')->where('uuid', $userAuth->uuid)->firstOrFail();

        return view('profile.editProfile', compact('userData'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'umur' => 'required|integer|min:1|max:120',
            'bio' => 'required|string|max:500',
        ]);

        $user = Auth::user();

        $profile = Profile_Model::where('users_id', $user->id)->first();

        if ($profile) {
            $profile->update([
                'age' => $request->umur,
                'bio' => $request->bio,
            ]);
            $message = 'Profil berhasil diperbarui.';
        } else {
            Profile_Model::create([
                'users_id' => $user->id,
                'age' => $request->umur,
                'bio' => $request->bio,
            ]);
            $message = 'Profil baru berhasil dibuat.';
        }

        return redirect('/profile')->with('success', $message);
    }

    public function changePassword()
    {
        return view('profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Users_Model::find(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/profile')->with('success', 'Password berhasil diperbarui.');
    }
}
