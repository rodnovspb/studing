<?php

spl_autoload_register(function ($class){
    $root = __DIR__;
    $ds = DIRECTORY_SEPARATOR;
    $filepath = $root . $ds . str_replace('\\', $ds, $class) . '.php';
    echo $filepath;
    require_once($filepath);
});


$obj = new \Block\Dir\User;
echo "<br>";
echo $obj->z;