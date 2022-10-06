<?php

require_once 'classes/Car.php';
require_once 'show.php';

$car1 = new Car;


$car1->brand = 'Вольво';

$car1->year = 2018;


show($car1);