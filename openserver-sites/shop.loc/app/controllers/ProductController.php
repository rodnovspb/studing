<?php


namespace app\controllers;


use app\models\Product;
use wfm\App;

/**  @property Product $model */

class ProductController extends AppController
{
    public function viewAction(){
        $lang = App::$app->getProperty('language');
        $product = $this->model->get_product($this->route['slug'], $lang);
        if(!$product){
            throw new \Exception("Товар {$this->route['slug']} не найден");
        }
    }
}