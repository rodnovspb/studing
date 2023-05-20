<?php

namespace App\Http\Controllers;



use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use Memcache;

use function Illuminate\Events\queueable;


class MainController extends Controller
{



    public function index()
    {

       $hash = \Hash::make('123');
       dd(\Hash::check('123', $hash));

//        return view('pages.index');
    }













}
