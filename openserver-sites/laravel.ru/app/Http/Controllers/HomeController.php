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
use Illuminate\Support\Facades\Validator;

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

        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',
        ]);


        $rules = [

        ];

        $messages = [
            'title.required' => 'Заполните название',
            'title.min' => 'Минимум 5 символов в названии',
            'rubric_id.integer' => 'Выберите рубрику'
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        Post::query()->create($request->all());
        return redirect()->route('home');
    }



}

