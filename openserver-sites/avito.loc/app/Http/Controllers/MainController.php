<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\MyClasses\MyClass;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;


class MainController extends Controller
{

    public function index()
    {
        $a = User::find(1);
        dd($a->getConstant());
        return view('pages.index' );
    }

}
