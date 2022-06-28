<?php
require_once 'show.php';

libxml_use_internal_errors(true);


$obj = simplexml_load_file('file.xml') or die('!!!');
if($obj === false){
    foreach (libxml_get_errors() as $error){
        echo $error->message . "<br>";
    }
} else {
    show($obj);
}