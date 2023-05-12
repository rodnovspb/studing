<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use stdClass;

use function Termwind\render;


class MainController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }

    public function give(Request $request){
        return $request->all();
    }






}
