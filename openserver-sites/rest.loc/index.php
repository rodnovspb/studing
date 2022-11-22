<?php
require 'db-goods.php';
require 'show.php';
?>
<style>
    td, th {
        border-collapse: collapse;
        border: 1px solid black;
        padding: 8px 15px;
    }
</style>

<?php

$url = $_SERVER['REQUEST_URI'];

if($url == '/'){
    echo 'Главная страница';
    echo "<div><a href='/goods'>Список товаров</a></div>";
} elseif ($url === '/goods' || $url === '/goods/'){
    require_once 'show-goods.php';
} elseif (preg_match('#^/good/(\d{1,3})/?$#', $url, $match)){
    require_once 'show-good.php';
} elseif ($url === '/good' || $url === '/good/'){
    require_once 'create.php';
} elseif (preg_match('#^/good/(\d{1,3})\?put=true$#', $url, $match)){
    require_once 'edit.php';
} elseif (preg_match('#^/good/(\d{1,3})\?del=true$#', $url, $match)){
    require_once 'delete.php';
} else {
    echo 'Страница не найдена';
    echo "<div><a href='/goods'>Список товаров</a></div>";
}















