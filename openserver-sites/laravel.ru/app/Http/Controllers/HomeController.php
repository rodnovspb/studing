<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('city')
            ->select('city.ID', 'city.Name as city_name', 'country.Code', 'country.Name as country_name')
            ->limit(10)->join('country', 'city.CountryCode', '=', 'country.Code')
            ->orderBy('city.ID')
            ->get();


          dump($data) ;

    }

    public function test()
    {
        return __METHOD__;
    }


}
