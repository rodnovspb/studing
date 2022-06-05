<?php


interface Dimensions {
    public function getSquare();
}

class Circle implements Dimensions {
    const PI = 3.14;
    public $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getSquare()
    {
        return self::PI*$this->radius**2;
    }
}

class Rectangle implements Dimensions {
    public $a;
    public $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function getSquare()
    {
        return $this->a * $this->b;
    }
}

$circle = new Circle(1);
echo $circle->getSquare();

$square = new Rectangle(1,1);
echo $square->getSquare();