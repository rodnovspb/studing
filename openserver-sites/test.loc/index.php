<?php
require_once 'show.php';



$str = file_get_contents('http://targ.loc/');

$str = preg_replace('#<style>.*?</style>#su', '', $str);



show($str, 1);


