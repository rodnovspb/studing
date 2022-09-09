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

        return 1;
    }

    public function test()
    {
        return __METHOD__;
    }


}
