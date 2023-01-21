<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function index() {
        return view('index');
    }


    public function register() {
        return view('register');
    }

    public function create_user(Request $request) {
        $user = User::create(['name'=>$request->name, 'email'=>$request->email, 'password'=>Hash::make($request->password)]);

        Auth::login($user);

        return redirect()->route('main');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('main');
    }





}
