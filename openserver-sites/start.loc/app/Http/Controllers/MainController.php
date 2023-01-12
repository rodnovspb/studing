<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index() {

        dd(Storage::get('files/UWq550R8TDRERgYTo0UKIiQmcxsAz7fS6FOhhnEo.txt'));
        return Storage::get('files/UWq550R8TDRERgYTo0UKIiQmcxsAz7fS6FOhhnEo.txt');
        return view('index');
    }

    public function store(Request $request) {
        if (!$request->hasFile('file')){ return redirect()->back(); }
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $path = Storage::putFile('files', new File($file));

    }




}
