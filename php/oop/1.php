<?php

class Circle {
    const PI=3.14;
    private $radius;
    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getSquare(){
        return self::PI*$this->radius**2;
    }
    public function getLength(){
        return self::PI*$this->radius*2;
    }
}

$one = new Circle(1);
echo $one->getSquare();
echo $one->getLength();