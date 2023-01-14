<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {

        dd(Auth::user());
        dd(auth()->user());







//        return view('index');
    }








}
