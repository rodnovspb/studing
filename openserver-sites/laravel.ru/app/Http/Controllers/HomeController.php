<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        DB::delete("DELETE FROM posts WHERE id = :id", ["id"=>1]);

    }

    public function test()
    {
        return __METHOD__;
    }


}
