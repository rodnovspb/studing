<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function show(){
        $marks = Mark::all();
        foreach ($marks as $mark){
            dump($mark->post);
            dump($mark->user);
        }
        dump($marks->loadCount('post'));
    }
}
