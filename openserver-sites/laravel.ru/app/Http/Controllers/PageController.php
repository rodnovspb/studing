<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function show($slug)
    {
        return view("pages.$slug", compact('slug'));
    }
}
