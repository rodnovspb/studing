<?php

namespace App\Http\Controllers;



use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{

    public function index()
    {
        $imageUrl = 'https://img3.akspic.ru/previews/5/5/4/1/7/171455/171455-zhivopis-illustracia-art-voda-oblako-500x.jpg';
        $image = file_get_contents($imageUrl);


        $path = Storage::disk('public')->put("/products_images/1/"  . uniqid() . ".jpg", $image);
        dd($path);
        return view('pages.index');
    }








}
