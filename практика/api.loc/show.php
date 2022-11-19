<?php

function show($arr, $die=false){
    echo "<pre><p style='background-color: beige;
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid; font-size: 20px;'>";
    if(is_bool($arr)){
        if($arr == 'bool(true)') {
            print_r('true');
        }  elseif ($arr == 'bool(false)'){
            print_r('false');
        }  else {
            var_dump($arr);
        }
    } elseif($arr === '') {
        print_r('пустая строка ""');
    } elseif($arr === null) {
        print_r('null');
    } else {
        print_r($arr);
    }
    echo "</p></pre>";
    if($die) {
        die;
    }
}