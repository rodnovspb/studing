<?php

$arr = [
    'key1'=>'значение 1',
    'key2'=>'значение 2',
    'key3'=>'значение 3',
];

ob_start();
extract($arr);
include 'view.php';
echo ob_get_clean();

//Подключаем константы

require_once 'const.php';
echo "Константа 1" . CONST1 ."<br>";
echo "Константа 2" . CONST2 ."<br>";
echo "Константа 3" . CONST3 ."<br>";
