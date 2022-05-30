<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showMenu(){
        return view('components.layout-3', [
            'h1' => 'Заголовок статьи'
        ]);
    }
}
