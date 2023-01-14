<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index() {

        $response = Http::get('https://lenta.ru/');

        dd($response->body());
        return $response->body();




//        return view('index');
    }








}
