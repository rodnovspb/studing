<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        $data = DB::table('country')->select('Name', 'Capital')->get();

          $data = DB::table('city')->where('ID', '=', 15)->value('District');

          dump($data) ;

    }

    public function test()
    {
        return __METHOD__;
    }


}
