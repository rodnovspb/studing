<?php

interface iCube {
    public function __construct($a);
    public function getVolume();
    public function getSquare();
}

class Cube implements iCube {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getSquare()
    {
        return $this**2*6;
    }
    public function getVolume()
    {
        return pow($this->a, 3);
    }
}

$one = new Cube(2);
echo $one->getVolume();