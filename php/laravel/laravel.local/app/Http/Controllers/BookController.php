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

    public function anonim(Request $request){
        $value = $request->session()->get('qwerty', function (){
            return 'Значение не задано, выполнилась анонимная функция';
        });
        echo $value;
    }

    public function forget(Request $request, $key){
        if($request->session()->get($key) !== null){
            $request->session()->forget($key);
            echo 'удалено';
        } else  echo 'такой переменной нет';
    }

    public function setVar(Request $request, $key){
        $request->session()->put('var', $key);
        return view('book.show', [
            'var'=> "установлена переменная $key"
        ]);
    }

    public function getVar(Request $request){
        return view('book.show', [
            'var'=> "показана и удалена переменная ". $request->session()->pull('var'),
        ]);
    }

    public function flush(Request $request){
        $request->session()->flush();
        echo "Удалено";
    }

    public function setkey(Request $request, $key, $value){
        $request->session()->put($key, $value);
        echo "Установлено: $key = $value" . "<br>";
        echo "<pre>";
        print_r($request->session()->all());
        echo "</pre>";
    }

    public function gettime(Request $request){
        if(!$request->session()->exists('time')){
            $request->session()->put('time', date('H-i-s'));
            echo 'время установлено';
        } else {
            $request->session()->put('time', date('H-i-s'));
            echo $request->session()->get('time');
        }
    }

    public function setarr(Request $request){
        $request ->session() ->put('arr', [1,2,3,4]);
        echo "<pre>";
        print_r($request ->session() ->get('arr'));
        echo "</pre>";
    }

    public function push(Request $request, $value){
        $request ->session() ->push('arr', $value);
        echo "<pre>";
        print_r($request ->session() ->get('arr'));
        echo "</pre>";
    }

    public function session($key, $value){
        session([$key => $value]);
        echo "<pre>";
        print_r(session($key, 'default'));
        echo "</pre>";
    }

}
