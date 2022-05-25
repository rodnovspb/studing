<?php

class Car {
    public $color='green';
    public $cost;

    public function setCost($a){
        $this->cost = $a;
    }
    public function getCost(){
        return $this->cost;
    }
}

$a = new Car;
$a->setCost(5000);

var_dump($a instanceof Car);