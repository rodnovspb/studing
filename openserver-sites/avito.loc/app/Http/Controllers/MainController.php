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
        $date = Product::query()->findOrFail(1)->created_at->format('d M H:m');;


        dd($date);

        return view('pages.index');
    }








}
