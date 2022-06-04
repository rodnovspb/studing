<?php


abstract class Car {
    public $color;

    function __construct($color)
    {
        $this->color = $color;
    }

    abstract public function getColor(): string;
}

class BMW extends Car {
    public function getColor():string
    {
        return $this->color;
    }
}

$obj = new BMW('зеленый');

echo $obj->getColor();