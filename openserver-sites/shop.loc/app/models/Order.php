<?php


namespace app\models;


use RedBeanPHP\R;

class Order extends AppModel
{
    public static function saveOrder($data):int | false {
        R::begin();
        try {
            $order = R::dispense("orders");
            $order->user_id = $data['user_id'];
            $order->note = $data['note'];
            $order->total = $_SESSION['cart.sum'];
            $order->qty = $_SESSION['cart.qty'];
            $order_id = R::store($order);
            self::saveOrderProduct($order_id, $data['user_id']);
            
            R::commit();
            return $order_id;
        } catch (\Exception $e){
            show($e->getMessage(), 1);
            R::rollback();
            return false;
        }
    }
    
    public static function saveOrderProduct($order_id, $user_id) {
        $sql_part = '';
        $binds = [];
        foreach ($_SESSION['cart'] as $product_id => $product) {
            if($product['is_download']){
                $download_id = R::getCell("SELECT download_id FROM product_download WHERE product_id = ?", [$product_id]);
                $order_download = R::xdispense("order_download");
                $order_download->order_id = $order_id;
                $order_download->user_id = $user_id;
                $order_download->product_id = $product_id;
                $order_download->download_id = $download_id;
                R::store($order_download);
            }
            
            $sum = $product['qty'] * $product['price'];
            $sql_part .= "(?,?,?,?,?,?,?),";
            $binds = array_merge($binds, [$order_id, $product_id, $product['title'], $product['slug'], $product['qty'], $product['price'], $sum]);
        }
        $sql_part = rtrim($sql_part, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, title, slug, qty, price, sum) VALUES $sql_part", $binds);
    }
    
}



























