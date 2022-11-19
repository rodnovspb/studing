<?php

require 'show.php';
header('Content-Type: application/json'); // укажем MIME


$url = 'https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=2022&country=rus&holidayType=public_holiday';


$arr = json_decode(file_get_contents($url), 1);

$res = [];

foreach ($arr as $item){
    array_push($res, $item['date']);
}


exit(json_encode($res));

