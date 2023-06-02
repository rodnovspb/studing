<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Services\UserService;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\MyClasses\SMSRU;
use App\Notifications\PaidNotification;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class MainController extends Controller
{


    public function index()
    {



        $user = User::query()->find(8);

        $user->notify(new PaidNotification($user));

        return view('pages.index');

    }

}













