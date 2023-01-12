<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function store(Request $request) {
        dd($request->file('file')->hashName());
        return $request->file('file')->store('files');
    }






}
