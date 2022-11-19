<?php

require 'show.php';


if(!empty($_GET['date1']) && !empty($_GET['date2'])){
    
    $regxp = '#^\d{4}-\d{1,2}-\d{1,2}$#';
    
    if(preg_match($regxp, $_GET['date1']) && preg_match($regxp, $_GET['date2'])){
        $timestamp1 = strtotime($_GET['date1']);
        $timestamp2 = strtotime($_GET['date2']);
        echo ($timestamp2 - $timestamp1)/60/60/24;
    } else {
        echo 'ошибка';
    }
    
    
} else {
    echo 'ошибка';
}


