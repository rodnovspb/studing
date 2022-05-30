<?php

class Car {
    public $name;
    protected $color;
    private $disk;
    public function setColor($color){
        $allowed = array('111', '222', '333');
        if(in_array($color, $allowed)) $this->color = $color;
    }
    public function getColor(){
        echo $this->color;
    }
}

$bmw = new Car;
$bmw->setColor('2222');
$bmw->getColor();

