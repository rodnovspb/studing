<?php
require 'show.php';

$url1 = 'http://api.loc/hour.php';
$url2 = 'http://api.loc/min.php';
$url3 = 'http://api.loc/sec.php';

$res1 = file_get_contents($url1);
$res2 = file_get_contents($url2);
$res3 = file_get_contents($url3);

show($res1, 1);
show($res2, 1);
show($res3, 1);