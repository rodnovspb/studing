<?php


namespace app\models;


use RedBeanPHP\R;

class Cart extends AppModel
{
    public function get_product($id, $lang): array {
        return R::getRow("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id=pd.product_id WHERE p.status = 1 AND p.id = ? AND pd.language_id = ?", [$id, $lang['id']]);
    }
    
    public function delete_item($id) {
        $qty_minus = $_SESSION['cart'][$id]['qty'];
        $sum_minus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty']-= $qty_minus;
        $_SESSION['cart.sum']-= $sum_minus;
        unset($_SESSION['cart'][$id]);
    }
    
    public static function translate_cart($lang) {
        if(empty($_SESSION['cart'])){
            return;
        }
        
        $ids = implode(', ', array_keys($_SESSION['cart']));
        $products = R::getAll("SELECT p.id, pd.title FROM product p JOIN product_description pd on p.id = pd.product_id WHERE p.id IN ($ids) AND pd.language_id = ?", [$lang['id']]);
        foreach ($products as $product) {
            $_SESSION['cart'][$product['id']]['title'] = $product['title'];
        }
    }

}














