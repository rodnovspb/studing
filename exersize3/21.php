<?php
require_once 'show.php';

libxml_use_internal_errors(true);
$my_data =
    "<?xml version='1.0' encoding='UTF-8'?> 
    <document> 
    <to>You</wrong>
    <from>Me</wrong>
    <heading>The Game</wrong
    <body>You lost it</wrong>
    </document>";

$obj = simplexml_load_string($my_data);
if($obj === false){
    foreach (libxml_get_errors() as $error){
        echo $error->message . "<br>";
    }
} else {
    show($obj);
}