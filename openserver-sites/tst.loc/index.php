<?php
require 'show.php';

$url = 'http://api.loc/index.php';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);

$query = ['day1', 'day2', 'day4'];

$data = ['json' => json_encode($query)];

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$res = curl_exec($curl);

$res = json_decode($res, 1);

show($res, 1);




