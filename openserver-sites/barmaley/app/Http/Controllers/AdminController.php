<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin() {
        return view('login');
    }

    public function login(Request $request) {
        if(Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ])) {
            return 'успешно';
        };
    }

    public function cabinet() {
        return view('cabinet');
    }
}
