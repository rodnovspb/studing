<?php

interface Figure {
    public function getPerimeter();
    public function getSquare();
}

class Quadrate implements Figure {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getPerimeter()
    {
       return $this->a*4;
    }
    public function getSquare()
    {
       return $this->a**2;
    }
}

class Circle implements Figure {
    const PI=3.14;
    private $radius;
    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getPerimeter()
    {
        return 2*$this->radius*self::PI;
    }
    public function getSquare()
    {
        return self::PI*$this->radius**2;
    }
}

$one = new Circle(1);
echo $one->getPerimeter();