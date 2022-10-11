<?php






spl_autoload_register('load1');
spl_autoload_register('load2', true, true);

function load1($class) {
   echo 1;
}

function load2($class) {
    echo 2;
}


