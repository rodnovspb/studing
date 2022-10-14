<?php

require_once 'show.php';

$data = json_decode(file_get_contents('https://belarusbank.by/api/kursExchange?city=%D0%91%D0%BE%D0%B1%D1%80%D1%83%D0%B9%D1%81%D0%BA'));

show($data[5]->home_number);