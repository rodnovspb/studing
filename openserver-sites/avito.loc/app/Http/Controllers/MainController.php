<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Services\UserService;
use App\Http\Resources\UserResource;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;


class MainController extends Controller
{


    public function index()
    {


        dd(base64_decode('0JDQkdCS0JPQlA=='));

        return view('pages.index');

    }

}













