<?php

spl_autoload_register();

require_once 'admin/page.php';
require_once 'users/page.php';
require_once 'admin/data/page.php';
require_once 'admin/view/page.php';
require_once 'project/page.php';
require_once 'core/page.php';
require_once 'modules/cart/page.php';
require_once 'modules/shop/cart/page.php';
require_once 'modules/marketCart.php';
require_once 'modules/shopCart.php';

//$adminPage = \Admin\Page;
//$usersPage = \Users\Page;
//$adminDataPage = \Admin\Data\Page;
//$adminViewPage = \Admin\View\Page;
//$projectController = \Project\Controller;
//$coreController = \Core\Controller;
//$modulesCart = \Modules\Cart\Goods;
//$modulesShopCart = \Modules\Shop\Cart\Goods;
//$modulesMarketProd = \Market\Cart\Prod;
//$modulesShopProd = \Market\Shop\Prod;


$obj1 = new Core\User;
echo $obj1->a;

$obj2 = new Core\Admin\Controller;
echo $obj2->b;

$obj3 = new Project\User\Data;
echo $obj3->c;














