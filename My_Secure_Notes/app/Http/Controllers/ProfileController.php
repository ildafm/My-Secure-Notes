<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    private $title, $active;

    public function __construct()
    {
        $this->title = 'Profile';
        $this->active = 'profile';
    }

    public function index($id)
    {
        $user_profile = User::where('id', $id)->first();
        // dd($user_profile);
        return view('users.profile')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('user_profile', $user_profile);
    }
}
