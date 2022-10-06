<?php
error_reporting(-1);
require_once 'classes/Car.php';
require_once 'show.php';

$car1 = new Car('white', 1000);



unset($car1);



