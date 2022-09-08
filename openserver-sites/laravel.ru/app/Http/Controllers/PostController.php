<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(Request $request)
    {
        dump($request->route()->getName());
    }

    public function index()
    {
        return view('posts.index');
    }


    public function create()
    {
        return view('posts.create');

    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function show($id)
    {
        return "Post $id";
    }

    public function edit($id)
    {
        return view('posts.edit', ['id' => $id]);
    }


    public function update(Request $request, $id)
    {
        dump($id);
        dd($request);
    }


    public function destroy($id)
    {
        dump(__METHOD__);
        dd($id);
    }
}
