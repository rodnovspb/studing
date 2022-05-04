<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PractiseController extends Controller
{
    public function getpage(){
        return view('practise.getpage', [
            'title'=>'Заголовок PractiseController getpage',
            'links'=>[
                [
                    'text' => 'text1',
                    'href' => 'href1',
                ],
                [
                    'text' => 'text2',
                    'href' => 'href2',
                ],
                [
                    'text' => 'text3',
                    'href' => 'href3',
                ],
            ],
            'employees'=>[
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
                [
                    'name' => 'user4',
                    'surname' => 'surname4',
                    'salary' => 4000,
                ],
                [
                    'name' => 'user5',
                    'surname' => 'surname5',
                    'salary' => 5000,
                ],
            ],
            'users'=>[
                [
                    'name' => 'user1',
                    'surname' => 'surname1',
                    'banned' => true,
                ],
                [
                    'name' => 'user2',
                    'surname' => 'surname2',
                    'banned' => false,
                ],
                [
                    'name' => 'user3',
                    'surname' => 'surname3',
                    'banned' => true,
                ],
                [
                    'name' => 'user4',
                    'surname' => 'surname4',
                    'banned' => false,
                ],
                [
                    'name' => 'user5',
                    'surname' => 'surname5',
                    'banned' => false,
                ],
            ],
            'str'=>['qweqweqwr', 'qweqwrer', 'rewrtrter', 'tdfgfdgfd'],

            'days'=>range(1, date('t')),
            'currentDay'=>date('d')
        ]);
    }
}
