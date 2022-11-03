<?php


namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use wfm\App;
use wfm\Cache;
use wfm\Controller;


/** @property Main $model **/

class MainController extends AppController
{
    
    public function indexAction(){
        
        $test = 'Hello';
        $cache = Cache::getInstance();
//        $cache->set('test', $test, 30);
        show($cache->get('test'), 1);
        
        $lang = App::$app->getProperty('language');
        $slides = R::findAll('slider');
        
        $products = $this->model->get_hits($lang, 6);
        
        $this->set(compact('slides', 'products'));
        $this->setMeta(___('main_index_meta_title'), ___('main_index_meta_description'), ___('main_index_meta_keywords'));
    }
    
}