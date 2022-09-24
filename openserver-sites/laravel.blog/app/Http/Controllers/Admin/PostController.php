<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required|integer',
            'thumbnail'=> 'nullable|image',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Post::uploadImage($request);

        $post = Post::query()->create($data);
        $post->tags()->sync($request->tags);

        $request->session()->flash('success', 'Статья добавлена');
        return redirect()->route('posts.index');

    }


    public function edit($id)
    {

        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required|integer',
            'thumbnail'=> 'nullable|image',
        ]);

        $post = Post::find($id);
        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request, $post->thumbnail);

        $post->update($data);
        $post->tags()->sync($request->tags);

        session()->flash('success', 'Обновлено');
        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {

        session()->flash('success', 'Удалено');
        return redirect()->route('posts.index');
    }
}
