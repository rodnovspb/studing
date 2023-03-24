<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match_all('#<h2[^>]*>(.+?)</h2>#', $str, $match, PREG_PATTERN_ORDER);

$arr = [];

foreach ($match[1] as $item){
    $item = trim($item);
    $item = strip_tags($item);
    $item = preg_replace('#\t+#', ' ', $item);
    $arr[] = $item;
}

show($arr, 1);


