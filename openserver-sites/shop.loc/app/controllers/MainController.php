<?php


namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;
use wfm\App;
use wfm\Controller;


/** @property Main $model **/

class MainController extends AppController
{
    
    public function indexAction(){
        $lang = App::$app->getProperty('language');
        $slides = R::findAll('slider');
        
        $products = $this->model->get_hits($lang, 6);
        
        $this->set(compact('slides', 'products'));
        $this->setMeta('Главная страница', 'Описание...', 'Ключевые слова');
    }
    
}