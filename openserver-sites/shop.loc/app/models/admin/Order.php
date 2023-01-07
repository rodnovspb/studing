<?php


namespace app\models\admin;


use app\models\AppModel;
use RedBeanPHP\R;

class Order extends AppModel
{
    public function get_orders($start, $perpage, $status):array {
        if($status){
            return R::getAll("SELECT * FROM orders WHERE $status ORDER BY id DESC LIMIT $start, $perpage");
        } else {
            return R::getAll("SELECT * FROM orders  ORDER BY id DESC LIMIT $start, $perpage");
        }
    }
}