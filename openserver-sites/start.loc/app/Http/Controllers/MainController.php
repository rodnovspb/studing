<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index() {

        dd(preg_replace_array('/:[a-z]+/', ['10:00', '18:00'], 'Работаем с :a до :b'));





        return view('index');
    }








}
