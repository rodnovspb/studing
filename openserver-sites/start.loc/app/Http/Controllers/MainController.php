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

        dd((string) Str::uuid());






        return view('index');
    }








}
