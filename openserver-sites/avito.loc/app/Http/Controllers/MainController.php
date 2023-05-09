<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use function Termwind\render;


class MainController extends Controller
{

    public function index(Request $request)
    {
        self::func();

    }


    public function func(){
        self::func1();
        throw new \Exception('исключение 1');
    }

    public function func1(){
        throw new \Exception('исключение 2');
    }



}
