<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'title'=> 'required'
        ]);

        $request->session()->flash('success', 'Статья добавлена');
        return redirect()->route('posts.index');

    }


    public function edit($id)
    {

       return view('admin.posts.edit');

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required'
        ]);


        session()->flash('success', 'Обновлено');
        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {

        session()->flash('success', 'Удалено');
        return redirect()->route('posts.index');
    }
}
