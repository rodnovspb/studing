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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
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

        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',
        ]);

        Post::query()->create($request->all());

        session()->flash('success', 'Данные сохранены');

        return redirect()->route('posts.create');
    }



}

