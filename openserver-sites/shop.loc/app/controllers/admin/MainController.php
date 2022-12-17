<?php


namespace app\controllers\admin;


class MainController extends AppController
{
    public function indexAction() {
        $this->setMeta('Админка :: Главная страница');
        $title = 'Главная страница';
        $this->set(compact('title'));
    }
}