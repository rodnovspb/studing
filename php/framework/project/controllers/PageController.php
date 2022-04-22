<?php

namespace Project\Controllers;
use \Core\Controller;
use Project\Models\Page;

class PageController extends Controller{
    private $pages;
    private $list;
    public function __construct()
    {
        $this->pages=[
            1 => 'страница 1',
            2 => 'страница 2',
            3 => 'страница 3',
        ];
        $this->list = [
            1 => ['title'=>'страница 1', 'text'=>'текст страницы 1'],
            2 => ['title'=>'страница 2', 'text'=>'текст страницы 2'],
            3 => ['title'=>'страница 3', 'text'=>'текст страницы 3'],
        ];
    }
    public function show1($params) {
        $page = $params['id'];
        $this->title=$this->list[$page]['title'];
        return $this->render('page/show1',
        [
            'text'=>$this->list[$page]['text'],
            'img_src'=>'/project/webroot/img.jpg'
        ]);
    }
    public function act(){
        $this->title = 'Контроллер page, действие act';
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
        $this->title = 'Контроллер page, действие show';
        echo $this->pages[$params['id']];
    }

    public function show3 () {
        echo '1';
    }
    public function show2 () {
        echo '2';
    }

    public function test(){
        $page = new Page;
        $data = $page->getById(2);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $data = $page->getById(3);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $data = $page->getByRange(2,6);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }


}