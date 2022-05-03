<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function show($id)
    {
        $posts = [
            1 => 'текст 1',
            2 => 'текст 2',
            3 => 'текст 3',
            4 => 'текст 4',
        ];
        return view('post.show', ['content'=>$posts[$id], 'title'=>'Заголовок из контроллера']);
    }

    public function view()
    {
        return view('test', ['var1' => 1, 'var2' => 2, 'var3' => 3]);
    }

    public function showUser($name, $surname){
        return view('post.showuser', ['var1'=>$name, 'var2'=>$surname]);
    }
}

