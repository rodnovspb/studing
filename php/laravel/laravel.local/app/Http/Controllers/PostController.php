<?php

namespace App\Http\Controllers;

class PostController extends Controller {
    public function show ($id) {
        $posts = [
            1=> 'текст 1',
            2=> 'текст 2',
            3=> 'текст 3',
            4=> 'текст 4',
        ];
        return "Пост номер  $posts[$id]";
    }
}
