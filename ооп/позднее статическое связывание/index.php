<?php

spl_autoload_register();




$a = new app\A();
$b = new app\B();

var_dump($a->getTest1());
var_dump($b->getTest2());