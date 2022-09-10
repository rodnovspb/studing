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
        $title = 'Домашняя страница';
        $h1 = '<h1>home page</h1>';
        $data1 = range(1,21);
        $data2 = [
            'title' => 'Title',
            'content' => 'Content',
            'keys' => 'Keywords',
        ];
        return view('home', compact('title', 'h1', 'data1', 'data2'));
    }











    public function test()
    {
        return __METHOD__;
    }


}
