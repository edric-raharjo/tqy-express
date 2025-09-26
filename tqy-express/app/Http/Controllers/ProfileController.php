<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Get the user's profile and show it 
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }
}
