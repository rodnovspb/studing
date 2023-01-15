<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index() {



        echo trans_choice('auth.apple|apples', 3);


//        return view('index');




//        return view('index');
    }








}
