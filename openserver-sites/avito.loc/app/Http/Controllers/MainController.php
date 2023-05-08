<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;


class MainController extends Controller
{

    public function index()
    {

        return view('pages.index');
    }

}
