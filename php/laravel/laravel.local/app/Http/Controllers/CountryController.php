<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function show(){
        $country = Country::find(1)->cities()->where('population', '>', 5000)->get();
        dd($country);
//        return view('country.show', ['countries'=>$country]);



    }
}
