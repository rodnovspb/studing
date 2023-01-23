<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function index(Request $request) {
        $request->session()->regenerate();
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

    public function cabinet() {
        return 'Кабинет';
    }

    public function inner(Request $request) {
        $user = $request->user();
        if($user->can('delete', $user)){
            return view('index', compact('user'));
        } else {
            return view('index', compact('user'));
        }
    }



}
