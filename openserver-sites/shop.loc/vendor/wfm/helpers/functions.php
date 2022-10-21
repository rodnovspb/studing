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