<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        flash('Message 1');
        flash('Message 2')->important();
        return view('pages.index');
    }
}
