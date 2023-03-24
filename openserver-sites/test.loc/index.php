<?php
require_once 'show.php';



$str = '<title>text</title>';

preg_match('#<title>(.+?)</title>#su', $str, $match);

show($match[1], 1);


