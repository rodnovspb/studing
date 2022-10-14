<?php

spl_autoload_register();

$a = A::getInstance();
$b = A::getInstance();

var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump(A::$instance);