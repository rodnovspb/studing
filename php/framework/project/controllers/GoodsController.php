<?php

namespace Project\Controllers;
use Core\Controller;
use Core\Model;
use Project\Models\Goods;

class GoodsController extends Controller {
    public function one($params){
        $page = (new Goods)-> getOne($params['id']);
        $this->title = 'Карточка товара';
        return $this->render('/goods/one', [
            'good' => $page,
        ]);
    }
    public function all(){
        $page = (new Goods)-> getAll();
        $this->title='Список товаров';
        return $this->render('goods/all', [
            'goods'=> $page,
        ]);
    }
}