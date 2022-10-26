<?php

function debug($data, $die = false){
    show($data);
    if($die) {
        die;
    }
    
}

function h($str) {
    return htmlspecialchars($str);
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}
























