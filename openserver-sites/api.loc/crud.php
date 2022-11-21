<?php

require_once 'vendor/autoload.php';
require 'show.php';

class_alias('\RedBeanPHP\R', '\R');

R::setup( 'mysql:host=localhost;dbname=lists',
    'root', '' );



if(!empty($_GET['action']) && $_GET['action'] === 'all'){
    $cities = R::getAll("SELECT * FROM city_");
} elseif (!empty($_GET['action']) && $_GET['action'] === 'get' && !empty($_GET['id'])){
    $cities = R::getAll("SELECT * FROM city_ WHERE id_city = ?", [$_GET['id']]);
} elseif (!empty($_GET['action']) && $_GET['action'] === 'del' && !empty($_GET['id'])){
    $var = R::exec("DELETE FROM city_ WHERE id_city = ?", [$_GET['id']]);
    if(!empty($var)){
        exit('удалено') ;
    } else {
        exit('не удалено');
    }
} elseif (!empty($_POST['action']) && $_POST['action'] === 'edit' && !empty($_POST['id']) && !empty($_POST['new_name'])){
    $city = R::exec("UPDATE city_ SET city_name_ru = ? WHERE id_city = ?", [$_POST['new_name'], $_POST['id']]);
    if($city) {
        exit('обновлено');
    } else {
        exit('не обновлено');
    }
    
} else {
    exit('ошибка');
}



show($cities, 1);








