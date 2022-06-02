<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function show1(){
        return "Введено от 2 до 9";
    }
    public function show2(){
        return redirect('/page/show1');
    }
    public function form(){
        return view('redirect.form');
    }
    public function receiveForm(){
        if(isset($_GET['text'])){
            $num = (int)$_GET['text'];
            if($num > 1 && $num <10){
                return redirect('/page/show1');
            } else {
                return "Введено меньше 2 или больше 9";
            }
        }
    }

}
