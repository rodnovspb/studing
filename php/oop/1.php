<?php

interface iFigure {
    public function getSquare();
}

interface iTetra {
    public function __construct($a);
}

interface iCircle {
    public function getRadius();
    public function getDiameter();
}

class Disc implements iCircle, iFigure {
    const PI=3.14;
    private $radius;
    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getRadius()
    {
        return $this->radius;
    }
    public function getDiameter()
    {
       return $this->radius*2;
    }
    public function getSquare()
    {
        return self::PI*$this**2;
    }
}


class Quadrate implements iFigure, iTetra {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getSquare()
    {
        return $this->a**2;
    }
}

$one = new Disc(1);
echo $one->getSquare();