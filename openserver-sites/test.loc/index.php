<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match_all('#<main[^>]*>(.+?)</main>#su', $str, $match, PREG_PATTERN_ORDER);



preg_match_all('#alt\s*=\s*(["\'])(.+?)\1#su', $match[1][0], $match1, PREG_PATTERN_ORDER);

show($match1[2], 1);