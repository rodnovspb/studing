<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index(Request $request) {

        Storage::disk('public')->put('example.txt', 'Contents');

//        return view('index');

    }


}
