<?php

$str = 'Denis,  ';

function foo($value){
    if(strpos($value, ', ') === false) return false;
    list($a, $b) = explode(', ', $value, 2);
    $string = (is_string($a) and is_string($b));
    $notempty = !empty($a) and !empty($b);
    return $string and $notempty;
}



$var = filter_var($str, FILTER_CALLBACK, ['options'=>'foo']);

var_dump($var);


