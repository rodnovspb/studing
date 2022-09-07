<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('city')->select('CountryCode')->distinct()->get();


          dump($data) ;

    }

    public function test()
    {
        return __METHOD__;
    }


}
