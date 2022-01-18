<?php













$now = time();
$year = date('Y');
$ney_year = strtotime('31-12-'.$year);

echo floor(($ney_year-$now)/60/60/24)































?>