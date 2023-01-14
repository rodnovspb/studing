<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index() {


        return  Http::get('https://lenta.ru/');




        return view('main');




//        return view('index');
    }








}
