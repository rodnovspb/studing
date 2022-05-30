<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function setSession(Request $request, $value){
        $request->session()->put('key', $value);
    }

    public function getSession(Request $request){
        $session = $request->session()->get('key');
        dump($session);
    }

    public function count(Request $request){
       $count = $request->session()->get('u', 0);
       $request->session()->put('u', $count+1);
        return view('count.count', [
            'count'=> $count,
        ]);
    }

    public function time(Request $request){
        if($request->session()->get('time') === null){
            $request->session()->put('time', date('H-i-s / Y-m-d'));
        }
        $t = date('H-i-s / Y-m-d');
        $time = $request->session()->get('time', $t);
        $request->session()->put('time', date('H-i-s / Y-m-d'));
        $count = $request->session()->get('u', 0);
        $request->session()->put('u', $count+1);
        return view('count.count', [
            'count'=> $count,
            'time' => $time,
            'now'=> $t,
        ]);
    }

}
