<?php

require 'show.php';

$history = [
    'day1' => 'История 1',
    'day2' => 'История 2',
    'day3' => 'История 3',
    'day4' => 'История 4',
    'day5' => 'История 5',
    'day6' => 'История 6',
    'day7' => 'История 7',
];

$arr = json_decode($_POST['json']);

$res = [];

foreach ($arr as $item){
    if(array_key_exists($item, $history)){
        $res[$item] = $history[$item];
    }
}


echo json_encode($res);




