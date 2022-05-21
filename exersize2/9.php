<?php

$int = 175;
$min = 1;
$max = 100;

if(filter_var($int, FILTER_VALIDATE_INT, ['options'=>['min_range'=>$min, 'max_range'=>$max]]) === false){
    echo("Значение переменной находится за пределами допустимого диапазона");
} else {
    echo("Значение переменной находится в допустимом диапазоне");
}


