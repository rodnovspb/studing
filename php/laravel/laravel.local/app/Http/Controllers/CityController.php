<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getWithModel(){
        $cities = City::all();
        $arr = [];
            foreach ($cities as $city){
                $subarr = [];
                $subarr['id'] = $city->id;
                $subarr['city'] = $city->city;
                $arr[] = $subarr;
            }
            return view('city.getwithmodel', ['cities'=>$arr]);
    }
}
