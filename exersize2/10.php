<?php

function callback($var){
    return strlen($var);
}

$arr = ["Apple", "Asus", "Huawei", "Lenovo"];

$lengts = array_map('callback', $arr);

print_r($lengts);