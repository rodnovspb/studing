<?php


namespace app\controllers;


use wfm\App;

class PageController extends AppController
{
    public function viewAction() {
        $lang = App::$app->getProperty('language');
        $page = $this->model->get_page($this->route['slug'], $lang);
        
        if(!$page){
            $this->error_404();
            return;
        }
        
        $this->setMeta($page['title'], $page['description'], $page['keywords']);
        $this->set(compact('page'));
    }
}