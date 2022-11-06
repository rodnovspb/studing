<?php


namespace app\models;


use RedBeanPHP\R;

class Cart extends AppModel
{
    public function get_product($id, $lang): array {
        return R::getRow("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id=pd.product_id WHERE p.status = 1 AND p.id = ? AND pd.language_id = ?", [$id, $lang['id']]);
    }

}