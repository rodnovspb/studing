<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class ResponseController extends Controller
{
    public function response(){
     return response()->view('response.response')
         ->header('Content-Type', 'text/html');
    }

    public function setCookie(){
        return response('1111', '200')
            ->cookie('qwerty', 'value', 10);
    }

    public function get(Request $request){
         dump($request->cookie('name'));
    }

    public function count(Request $request){
        if($request->cookie('count') === null) {
            return response()->view('response/count', [
                'count'=>1,
            ])->cookie('count', 1, 10);
        } else {
            $count = $request->cookie('count')+1;
            return response()->view('response/count', [
                'count'=>$count,
            ])->cookie('count', $count, 10);
        }
    }

    public function queue(Request $request){
        Cookie::queue('key211', 'value1', 10);
        Cookie::queue('key2222', 'value2', 10);
        Cookie::queue('key3333', 'value3', 10);
        return response('куки установлены', '200');
    }

    public function rvch(Request $request){
        return response()
            ->view('response.rvch')
            ->cookie('cookie1', 'value1', 10)
            ->header('Content-Type', 'text/html');
    }

    public function flash(Request $request){
        $request->session()->flash('qwerty', 111111111);
        return redirect('/getflash');
    }

    public function getflash(Request $request){
        return view('response.getflash', [
            'flash' =>$request->session()->get('qwerty'),
        ]);
    }

    public function form(Request $request){
//        $request->flashExcept('password');
        return view('response.form');
    }

    public function getForm(Request $request){
        // редирект с включением данных формы
        return redirect('form-saveflash')->withInput();
    }

    public function project(){
        return view('response.project');
    }
}
