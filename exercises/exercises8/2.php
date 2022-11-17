<?php

function func(){
    ob_start();
    require 'params.php';
    return ob_get_clean();
}

$a = require 'params.php';

echo $a;

