<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\MyClasses\MyClass;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use function Termwind\render;


class MainController extends Controller
{

    public function index(Request $request, MyClass $myClass)
    {
        $myClass->obj->send();
    }






}
