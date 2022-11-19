<?php
require 'show.php';

$url = 'http://api.loc/?num1=10&num2=5555';


$res = json_decode(file_get_contents($url));

show($res, 1);

