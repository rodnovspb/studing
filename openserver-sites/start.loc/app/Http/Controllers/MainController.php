<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index(Request $request) {

        $data = Storage::get('/files/1.jpeg');

        Storage::put('file.jpg', $data);
        return Storage::path('/files/1.jpeg');



//        return view('index');

    }


}
