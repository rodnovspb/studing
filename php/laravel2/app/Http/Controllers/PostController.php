<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::query()->orderBy('created_at', "DESC")->paginate(3);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id){
        $post = Post::query()->findOrFail($id);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function comment($id, CommentForm $request){
        $post = Post::query()->findOrFail($id);
        $post->comments()->create($request->validated());
        return redirect(route('posts.show', $id));
    }
}
