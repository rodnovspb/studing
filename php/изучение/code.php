<?php







$today = date_create('2022-01-18');

date_modify($today, '-100 days');

$day = date_format($today, 'Y-m-d');

echo date('w', strtotime($day))


































?>