<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


class MainController extends Controller
{

    public function index()
    {
        $user = User::make([
            'name' => 'вфыв',
            'email' => Str::random(),
            'password' => 111111
        ]);

        dd($user->getAttributes());

    }

}
