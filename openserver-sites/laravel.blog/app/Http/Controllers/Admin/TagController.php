<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'title'=> 'required'
        ]);
        Tag::create($request->all());
        $request->session()->flash('success', 'Тег добавлен');
        return redirect()->route('tags.index');

    }


    public function edit($id)
    {
       $tag = Tag::query()->find($id);
       return view('admin.tags.edit', compact('tag'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required'
        ]);

        $tag = Tag::query()->find($id);
        $tag->update($request->all());
        session()->flash('success', 'Обновлено');
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if($tag->posts->count()){
            return redirect()->route('tags.index')->with('error', 'Ошибка, тег присвоен записи');
        }
        $tag->delete();
        session()->flash('success', 'Удалено');
        return redirect()->route('tags.index');
    }

}
