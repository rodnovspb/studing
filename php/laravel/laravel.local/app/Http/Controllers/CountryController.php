<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function show(){
        $country = Country::all();
        return view('country.show', ['countries'=>$country]);

//        foreach ($country as $item){
//            dump($item->country);
//            foreach ($item->cities as $city){
//                dump($city->city);
//            }
//        }


    }
}
