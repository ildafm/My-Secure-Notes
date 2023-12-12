<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    private $title, $active, $oldPane;

    public function __construct()
    {
        $this->title = 'Profile';
        $this->active = 'profile';
        $this->oldPane = 'general';
    }

    public function index($id)
    {
        $user_profile = User::where('id', $id)->first();

        return view('users.profile')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('oldPane', $this->oldPane)
            ->with('user_profile', $user_profile);
    }

    public function update(Request $request, $user_id, $edit_mode)
    {

        $user_profile = User::where('id', $user_id)->first();
        $this->oldPane = $edit_mode;

        if ($edit_mode == 'general') {
            // Jika mengedit Username 
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
            ], [
                'name.required' => "Kolom :attribute tidak boleh kosong",
                'name.max' => "Kolom :attribute tidak boleh lebih dari 255 karakter",
            ]);


            $user_profile->update([
                'name' => $validateData['name'],
            ]);
            $request->session()->flash('pesan_success_edit', 'Berhasil Mengubah Data Profile');
        } elseif ($edit_mode == 'password') {
            // Jika mengedit Password
            $validateData = $request->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user_profile) {
                    if (!Hash::check($value, $user_profile->password)) {
                        $fail('The current password is incorrect.');
                    }
                }],
                'password' => ['required', 'min:8', 'max:255', 'confirmed', Rules\Password::defaults()],
            ]);

            // update password
            $user_profile->update([
                'password' => Hash::make($validateData['password']),
            ]);
            $request->session()->flash('pesan_success_edit', 'Berhasil Mengubah Password Profile');
        }

        return redirect()->back();
    }
}
