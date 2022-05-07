<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

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
        return view('post.show', ['content' => $posts[$id], 'title' => 'Заголовок из контроллера']);
    }

    public function view()
    {
        return view('test', ['var1' => 1, 'var2' => 2, 'var3' => 3]);
    }

    public function showUser($name, $surname)
    {
        return view('post.showuser', ['var1' => $name, 'var2' => $surname]);
    }

    public function print($var)
    {
        echo "<pre>";
        print_r($var->all());
        echo "<pre>";
    }

    public function func(){
        $collection = Collection::wrap('1, 2, 3');
        return $collection;


    }

}

