<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index() {

        report('Something went wrong.');


        return view('index');
    }








}
