<?php













$date = '2025-12-31';

$date = date_create($date);

date_modify($date, '-3 days');

echo date_format($date, 'd-m-Y');































?>