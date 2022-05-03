<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather($city){
        return view('weather.getweather', ['city'=>$city]);
    }
}
