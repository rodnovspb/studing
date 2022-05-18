<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function show(){
        $marks = Mark::with(['post', 'user'])->get();
        foreach ($marks as $mark){
            dump($mark->post);
            dump($mark->user);
        }
    }
}
