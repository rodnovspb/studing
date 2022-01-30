<?php

$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];



$timestamp = mktime(0,0,0,$month, $day, $year);

echo "День недели: " . date('w', $timestamp);











?>