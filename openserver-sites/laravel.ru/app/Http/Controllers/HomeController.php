<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        DB::insert("INSERT INTO posts (title, content) VALUES (?, ?)", ['Статья 4', 'Контент статьи 4']);


        $posts = DB::select("SELECT * FROM posts");
        dump($posts);


//        dump(config('services.mailgun.endpoint'));
//        return view('home', ['res'=>'Денис']);
    }

    public function test()
    {
        return __METHOD__;
    }


}
