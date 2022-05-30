<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Component extends Controller
{
    public function show(){
        return view('components.component.component');
    }
}
