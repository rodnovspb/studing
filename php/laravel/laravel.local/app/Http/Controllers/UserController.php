<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($name){
        $users = [
            'user1' => 'city1',
            'user2' => 'city2',
            'user3' => 'city3',
            'user4' => 'city4',
            'user5' => 'city5',
        ];
        return $users[$name] ?? 'не существует';
    }
    public function getAge(){
        $content = 'Контент для getAge';
        return view('user.getage', ['content'=>$content, 'title'=>'Тайтл для getAge']);
    }
    public function getSalary($salary){
        $content = 'Контент для getSalary';
        return view('user.getsalary', ['salary'=>$salary, 'content'=>$content, 'title'=>'Тайтл для getSalary']);
    }
    public function getSex($sex){
        $content = 'Контент для getSex';
        return view('user.getsex', ['sex'=>$sex, 'content'=>$content, 'title'=>'Тайтл для getSex']);
    }
}
