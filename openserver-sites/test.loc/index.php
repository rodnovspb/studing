<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

$str = preg_replace('#<script[^>]*>.*?</script>#su', '', $str);



show($str, 1);


