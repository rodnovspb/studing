<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        return date("Y-m-d h-i-s");
        return now();

//        DB::update("UPDATE posts SET title = ? WHERE id = ?", ['rrrrr', 5]);

    }

    public function test()
    {
        return __METHOD__;
    }


}
