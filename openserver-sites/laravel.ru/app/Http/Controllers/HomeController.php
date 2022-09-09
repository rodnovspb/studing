<?php


namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Person;
use App\Models\Phone;
use App\Models\Post;
use App\Models\City;
use App\Models\Rubric;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $rubrics = Rubric::get();

        foreach ($rubrics as $rubric){
            dump($rubric->post->title);
        }
    }

    public function test()
    {
        return __METHOD__;
    }


}
