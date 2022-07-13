<?php

function show($arr){
    echo "<pre><p style='background-color: beige; 
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid'>";
    if(is_bool($arr)) var_dump($arr);
    else print_r($arr);
    echo "</p></pre>";
}

