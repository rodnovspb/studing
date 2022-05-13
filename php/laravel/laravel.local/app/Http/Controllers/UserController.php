<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(){
        $users = DB::table('users')->where('age', '>', 20)->where('age', '<', 30)->inRandomOrder()->first();
        dump($users);
//        return view('user.get', ['users'=>$users]);
    }

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
    public function getPage($page){
        $table = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $text = 'текст ссылки';
        $href = 'https://yandex.ru/';
        return view('user.getpage', [
            'array'=> [[1, 2, 3], [4, 5, 6], [7, 8, 9], 1],
            'arr4'=>[1,1,0, 2,3,0,4,5,0, 56],
            'table'=>$table,
            'data'=> [1],
            'arr1'=>[1,2,3,4],
            'correct'=>false,
            'arrOfStr'=>['qwerty', 'asdfgh', 'rtyuio', 'fghdsg'],
            'isAuth'=>true,
            'str'=>"<b>text</b>",
            'script'=>"<script>alert('!!!!!')</script>",
            'year'=>2022,
            'month'=>'май',
            'location'=>['country'=>"Россия", 'city'=>'Челябинск'],
            'city'=>'Севастополь',
            'page'=>$page,
            'name'=>'Денис',
            'age'=>35,
            'salary'=>5000,
            'class'=>'invisible',
            'value1'=> '',
            'value2'=>'2000',
            'value3'=>'3000',
            'style'=>'color: red',
            'text'=> $text,
            'href'=> $href,
            'arr'=>[1,2,3,4],
            'employee'=>['name'=>'Вася', 'age'=>'111', 'salary'=>50000],
            'elements'=> [
                [
                    'name' => 'user1',
                    'surname' => 'surname1',
                    'salary' => 1000,
                ],
                [
                    'name' => 'user2',
                    'surname' => 'surname2',
                    'salary' => 2000,
                ],
                [
                    'name' => 'user3',
                    'surname' => 'surname3',
                    'salary' => 3000,
                ],
            ],
            'var5'=>[]

            ]);
    }
}
