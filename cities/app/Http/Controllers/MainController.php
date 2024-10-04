<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    public function index(Request $request, $slug = null){

        $cityNamesAndSlugs = City::pluck('slug', 'name')->toArray();

//        чтобы не тормозило, выберем первые 50 городов
        array_splice($cityNamesAndSlugs, 50);

        $sessionSlug = Session::get('slug');

        if($slug && in_array($slug, $cityNamesAndSlugs) && $slug !== $sessionSlug){
            Session::put(['slug' => $slug, 'name' => array_search($slug, $cityNamesAndSlugs)]);
        } elseif (!$slug && $sessionSlug){
            return redirect(route('index', ['slug' => $sessionSlug]), 301);
        }

        return view('index', compact('cityNamesAndSlugs', 'slug'));
    }


    public function about(){
        return view('about');
    }

    public function news(){
        return view('news');
    }




//    Функция сохраняет города в таблицу из базы данных cities

//    public function getCities(){
//        $response = Http::get('https://api.hh.ru/areas');
//
//        if ($response->successful()){
//            $data = $response->json();
//
//            $parentAreas = $data[0]['areas'];
//
//            $cities = [];
//
//            /*создаем массив уникальных населенных пунктов на русском языке*/
//            foreach ($parentAreas as $parentArea){
//                $childAreas = $parentArea['areas'];
//                foreach ($childAreas as $childArea){
//                    /*Убираем из строк то, что в скобках*/
//                    $result = preg_replace('/\s*\(.*?\)\s*/', '', $childArea['name']);
//
//                    if(!in_array($result, $cities)){
//                        array_push($cities, $result);
//                    }
//                }
//            }
//
//            foreach ($cities as $city){
//                /*вставляю в БД только если их там нет*/
//                $slug = Str::slug($city, '-', 'ru');
//                $count = 0;
//
//                if(City::where('name', $slug)->doesntExist() && City::where('slug', $slug)->doesntExist()){
//                    City::query()->create([
//                        'name' => $city,
//                        'slug' => $slug
//                    ]);
//                    $count++;
//                }
//
//            }
//            dump("Вставилось $count городов");
//
//        } else {
//            return response()->json(['error' => 'Ошибка получения данных'], 500);
//        }
//    }
}
