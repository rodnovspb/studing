<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Services\UserService;
use App\Http\Resources\UserResource;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;






class MainController extends Controller
{


    public function index()
    {
        return view('pages.index');

    }

}













