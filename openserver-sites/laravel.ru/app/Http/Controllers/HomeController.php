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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $title = 'Заголовок';
        return view('home', compact('title', 'posts'));
    }

    public function create(){
        $rubrics = Rubric::query()->pluck('title', 'id')->all();
        return view('create', ['title' => 'Создать пост', 'rubrics'=>$rubrics]);
    }

    public function store(Request $request){
//        Post::query()->create($request->all());
        (new Post())->fill(['title'=> $request->input('title'), 'content'=> $request->input('content'), 'rubric_id' => $request->input('rubric_id')])->save();
        return redirect()->route('home');
    }



}

