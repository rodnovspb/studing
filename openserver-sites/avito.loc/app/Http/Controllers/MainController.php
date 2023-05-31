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

        dd(clean('This is my H1 title', 'titles'));

        return view('pages.index');

    }

}













