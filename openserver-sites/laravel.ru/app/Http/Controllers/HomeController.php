<?php


namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Post;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $data = new Post();
        $data->title = 'asdasd';
        $data->content = 'asdasd';
        $data->save();


    }

    public function test()
    {
        return __METHOD__;
    }


}
