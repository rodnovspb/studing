<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request) {
        return view('page');
//        return response()->file('./storage/images/9ivNa8yX4cngDIPNanphOyeDnrCuGMXTLhOifRLm.jpg');
    }
}
