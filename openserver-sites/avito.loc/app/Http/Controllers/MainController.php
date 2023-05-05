<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\MyClasses\MyClass;
use Illuminate\Support\Facades\App;


class MainController extends Controller
{

    public function index()
    {
        dd(App::make(MyClass::class)->func(7));
//        return view('pages.index');
    }

}
