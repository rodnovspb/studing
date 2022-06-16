<?php
namespace Math\Geometry;

class Circle {
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function length(){
        echo 2*$this->radius * \Math\Constants::PI;
    }
}
