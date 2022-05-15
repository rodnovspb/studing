<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show(){
        $profile = Profile::all();
        return view('profile.show', ['arr'=>$profile]);
    }
}
