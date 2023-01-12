<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index(Request $request) {

        $path = Storage::putFile('photos', new File('/files/1.jpeg'));

        $data = Storage::get('/files/1.jpeg');

        Storage::put('file.jpg', $data);

        return Storage::url('file.jpg');




//        return view('index');

    }


}
