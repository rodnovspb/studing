<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function count(){
        echo "<pre>";
        echo session('counter');
        echo "</pre>";
    }
}
