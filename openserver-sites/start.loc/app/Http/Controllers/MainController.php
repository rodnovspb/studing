<?php

namespace App\Http\Controllers;
use App\Events\GoodDeleted;
use App\Models\Good;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function index(Request $request)
    {

        $user = User::find(1);

        $user->my_word = 'Денис';
        dd($user->attributes[]);
        $user->save();




        return view('index');

    }

}
