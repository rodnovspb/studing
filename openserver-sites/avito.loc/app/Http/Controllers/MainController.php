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
        dd(User::find(1)->is_admin());
        return view('pages.index' );
    }

}
