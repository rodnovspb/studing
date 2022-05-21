<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request, $id, $login){
        $data = $request->except('_token');
        var_dump($request->is('id-login/*'));
//        if($request->isMethod('get')) echo 'Метод Гет';
//        if($request->isMethod('post')) echo 'Метод Пост';
        return view('login.login', ['arr'=>$data, 'id'=>$id, 'login'=>$login]);
    }

    public function tasks(Request $request){
        echo "path - " . $request->path();
        echo "<br>";
        echo "url - " . $request->url();
        echo "<br>";
        echo "fullUrl - " . $request->fullUrl();
        echo "<br>";
        var_dump($request->is('*/method*'));
    }
}
