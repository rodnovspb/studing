<?php


namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $data = Country::query()->limit(5)->get();

        dd($data[0]);

    }

    public function test()
    {
        return __METHOD__;
    }


}
