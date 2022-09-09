<?php


namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Person;
use App\Models\Phone;
use App\Models\Post;
use App\Models\City;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tag = Tag::query()->find(6);
        dump($tag->title);

        foreach ($tag->posts as $post){
            dump($post->title);
        }
    }











    public function test()
    {
        return __METHOD__;
    }


}
