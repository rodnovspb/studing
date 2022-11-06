<?php


namespace app\controllers;


use wfm\App;

class CartController extends AppController
{
    public function addAction(){
        $lang = App::$app->getProperty('language');
        $id = get('id');
        $qty = get('qty');
        if(!$id){
            return false;
        }
       
        $product = $this->model->get_product($id, $lang);
        show($product, 1);
    }

}