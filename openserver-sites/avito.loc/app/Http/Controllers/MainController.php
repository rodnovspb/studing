<?php

namespace App\Http\Controllers;



use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Illuminate\Http\Request;



class MainController extends Controller
{

    public function index()
    {


        return view('pages.index');
    }








}
