<?php

$str = ['e0'=>213, "qweqwe"=>"dasd"];

$json = json_encode($str);


$obj = json_decode($json);

foreach ($obj as $item=>$value){
    echo $item . ' ' . $value;
}