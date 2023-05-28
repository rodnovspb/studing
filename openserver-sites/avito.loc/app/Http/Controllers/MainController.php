<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Services\UserService;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;






class MainController extends Controller
{
    private $service;

    public function __construct(UserService $user)
    {
        $this->service = $user;
    }

    public function index(UserService $user)
    {
        return $this->service->getUser(14);
    }

}













