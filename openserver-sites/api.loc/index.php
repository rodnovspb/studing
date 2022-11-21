<?php

require_once 'vendor/autoload.php';
require 'show.php';

class_alias('\RedBeanPHP\R', '\R');

R::setup( 'mysql:host=localhost;dbname=lists',
    'root', '' );


if($_GET['action'] === 'all'){
    $cities = R::getAll("SELECT * FROM city_");
} elseif ($_GET['action'] === 'get' && !empty($_GET['id'])){
    $cities = R::getAll("SELECT * FROM city_ WHERE id_city = ?", [$_GET['id']]);
} elseif ($_GET['action'] === 'del' && !empty($_GET['id'])){
    $var = R::exec("DELETE FROM city_ WHERE id_city = ?", [$_GET['id']]);
    if(!empty($var)){
        exit('удалено') ;
    } else {
        exit('не удалено');
    }
} elseif ($_GET['action'] === 'edit' && !empty($_GET['id']) && !empty($_GET['new_name'])){
    $city = R::exec("UPDATE city_ SET city_name_ru = ? WHERE id_city = ?", [$_GET['new_name'], $_GET['id']]);
    if($city) {
        exit('обновлено');
    } else {
        exit('не обновлено');
    }
    
} else {
    exit('ошибка');
}



show($cities, 1);








