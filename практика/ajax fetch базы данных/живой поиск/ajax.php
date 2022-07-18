<?php

$arr = [
'Тест JavaScript',
'Тест PHP',
'Учебник HTML',
'Учебник JavaScript',
'JavaScript Функции',
'JavaScript Синтаксис'
];

if(!empty($_REQUEST['str'])){
    $str = $_REQUEST['str'];
    $result = '';
    foreach ($arr as $item){
        if(str_starts_with($item, $str)){
            $result .= "<li>$item</li>";
        }
    }
    $result === '' ? $result = "<li>Нет результатов</li>" : $result;
    exit($result);
}