<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\Other\Block as Q;

class Block extends Controller
{
    public function show(){
        return view('components.other.block');
    }
}
