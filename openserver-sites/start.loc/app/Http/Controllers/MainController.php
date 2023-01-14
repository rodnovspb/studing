<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index() {

        dd(__('passwords.reset'));





        return view('index');
    }








}
