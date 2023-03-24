<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

preg_match_all('#<aside[^>]*>(.+?)</aside>#su', $str, $match, PREG_PATTERN_ORDER);



preg_match_all('#<h2[^>]*>(.+?)</h2>#su', $match[0][0], $match1, PREG_PATTERN_ORDER);

show($match1[1], 1);


