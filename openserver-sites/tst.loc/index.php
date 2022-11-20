<?php
require 'show.php';

$url = 'http://api.loc/index.php';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);

$data = ['num1'=>'1', 'num2'=>'100'];

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$res = curl_exec($curl);

show($res, 1);




