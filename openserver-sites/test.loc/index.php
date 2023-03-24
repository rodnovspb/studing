<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match('#<body[^>]*>(.+?)</body>#su', $str, $match);

preg_match_all('#href\s*=\s*(["\'])(.+?)\1#', $match[1], $match1);

show($match1[2], 1);