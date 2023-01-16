<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index() {

        Mail::to('rodnovspb@mail.ru')->later(now()->addMinutes(10), new OrderShipped('Б-325'));




        return view('index');




//        return view('index');
    }








}
