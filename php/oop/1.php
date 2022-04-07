<?php

interface iSphere {
    const PI=3.14;
    public function __construct($radius);
    public function getSquare();
    public function getVolume();
}

class Sphere implements iSphere {
    private $radius;
    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getSquare()
    {
        return $this->radius**2*self::PI;
    }
    public function getVolume()
    {
        return $this->radius**3*self::PI;
    }
}

$one = new Sphere(1);
echo $one->getSquare();