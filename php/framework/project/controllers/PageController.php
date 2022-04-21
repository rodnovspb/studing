<?php

namespace Project\Controllers;
use \Core\Controller;

class PageController extends Controller{
    private $pages;
    public function __construct()
    {
        $this->pages=[
            1 => 'страница 1',
            2 => 'страница 2',
            3 => 'страница 3',
        ];
    }
    public function act(){
        return $this->render('page/act',
            [
                'var1' => 'eee',
                'var2' => 'bbb',
                'var3' => 'kkk',
                'header'=> 'список пользователей',
                'users' => ['user1', 'user2', 'user3']
            ]);
    }

    public function show($params){
        echo $this->pages[$params['id']];
    }

    public function show1 () {
        echo '1';
    }
    public function show2 () {
        echo '2';
    }

}