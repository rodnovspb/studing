<?php


class Car {
    public $color;
    public $fuel;
    public function go(){
    }
    public function turn(){
    }
    public function stop(){
    }
}

$myCar = new Car;

$myCar ->color='red';
$myCar ->fuel='gaz';
$myCar ->go();
$myCar->stop();