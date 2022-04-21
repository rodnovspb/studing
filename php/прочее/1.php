<?php
$users = [
    1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
    2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
    3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
    4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
    5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
];


    $str = "<span>{$users[1]['name']}</span>" ;
    echo $str;
