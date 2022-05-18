<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function show(){
        $country = Country::with('cities')->find(1);
        foreach ($country->cities as $city){
            dump($city);
        }

//        return view('country.show', ['countries'=>$country]);



    }
}
