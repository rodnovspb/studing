<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
}
