<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function showCountry(){
       $cities= City::take(1000)->where('population', '>', 5000)->get();
       foreach ($cities as $item){
           dump($item->city);
           dump($item->countries['country']);
       }
    }

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
