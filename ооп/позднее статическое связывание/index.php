<?php

spl_autoload_register();




$a = new app\A();
$b = new app\B();

var_dump($a->getTest());
var_dump($b->getTest());