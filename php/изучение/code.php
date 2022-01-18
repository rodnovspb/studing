<?php













$date = date_create('2022-01-18');

date_modify($date, '3 days');

echo date_format($date, 'd.m.y')































?>