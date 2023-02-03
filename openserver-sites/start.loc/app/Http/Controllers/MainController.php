<?php

namespace App\Http\Controllers;
use App\Events\GoodDeleted;
use App\Http\Resources\UserResource;
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

use function MongoDB\BSON\toJSON;


class MainController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();


        return UserResource::collection($user);







        return view('index');

    }

}
