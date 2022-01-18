<?php







$str = 'qwerty';
$str = strrev($str);


$arr = str_split($str, 1);

$arr[0] = mb_strtoupper($arr[0]);

$str = implode('', $arr);
$str = strrev($str);

var_dump($str);







































?>