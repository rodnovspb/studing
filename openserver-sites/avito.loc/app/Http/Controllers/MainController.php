<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\MyClasses\MyClass;
use Illuminate\Support\Facades\App;


class MainController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('pages.index', compact('users'));
    }

}
