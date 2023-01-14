<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function index() {

        dd(Str::mask('89514466332', '*', 5));






        return view('index');
    }








}
