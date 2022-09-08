<?php


namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Post;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        Post::query()->create(['title'=>'1111', 'content'=> '22222'], ['title'=>'1111', 'content'=> '22222']);


    }

    public function test()
    {
        return __METHOD__;
    }


}
