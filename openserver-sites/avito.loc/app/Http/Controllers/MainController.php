<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Services\UserService;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;






class MainController extends Controller
{

    public function index(UserService $user)
    {
        return UserService::showUser(13);
        return $user->getUser(13);
    }















}
