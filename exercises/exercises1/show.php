<?php

function show($arr){
    echo "<pre><p style='background-color: rgba(51,204,255,0.27);
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid'>";
    if(is_bool($arr)){
        if($arr == 'bool(true)') {
            print_r('true');
        }  elseif ($arr == 'bool(false)'){
            print_r('false');
        }  else {
            var_dump($arr);
        }
    } else print_r($arr);
    echo "</p></pre>";
}

