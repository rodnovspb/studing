<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match_all('#<nav[^>]*>(.+?)</nav>#su', $str, $match, PREG_PATTERN_ORDER);

$str1 = $match[1][0];

preg_match_all('#href\s*=\s*(["\'])(.+?)\1#su', $str1, $match1, PREG_PATTERN_ORDER);

show($match1[2], 1);


