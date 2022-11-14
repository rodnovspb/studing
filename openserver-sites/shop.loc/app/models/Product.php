<?php


namespace app\models;


use RedBeanPHP\R;

class Product extends AppModel
{
    public function get_product($slug, $lang): array {
        return R::getRow("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE p.status = 1 AND p.slug = ? AND pd.language_id = ?", [$slug, $lang['id']]);
    }

}