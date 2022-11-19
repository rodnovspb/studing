<?php

require 'show.php';



if(!empty($_GET['date1']) && !empty($_GET['date2'])){
    
    $timestamp1 = strtotime($_GET['date1']);
    $timestamp2 = strtotime($_GET['date2']);
    
    echo ($timestamp2 - $timestamp1)/60/60/24;
    
    
} else {
    echo 'ошибка';
}


