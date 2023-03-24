<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match_all('#<link[^>]+href\s*=\s*(["\'])(.+?)\1>#', $str, $match, PREG_PATTERN_ORDER);

show($match[2], 1);