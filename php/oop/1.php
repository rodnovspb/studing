<?php

abstract class Figure {
    abstract public function getPerimeter();
    abstract public function getSquare();
    public function getRatio(){
        return $this->getSquare()/$this->getPerimeter();
    }
    public function getSquarePerimeterSum(){
        return $this->getPerimeter()+$this->getSquare();
    }
}

class Rectangle extends Figure {
    private $a;
    private $b;
    public function __construct($a, $b)
    {
        $this->a=$a;
        $this->b=$b;
    }

    public function getPerimeter()
    {
        return ($this->b+$this->b)*2;
    }
    public function getSquare()
    {
       return $this->b*$this->a;
    }
}
class Circle extends Figure {
    const PI=3.14;
    private $radius;
    public function __construct($radius)
    {
        $this->radius=$radius;
    }
    public function getSquare()
    {
        return $this->radius**2*self::PI;
    }
    public  function getPerimeter()
    {
        return 2*self::PI*$this->radius;
    }
}

$one = new Rectangle(1,1);
echo $one->getSquare();
echo '<br>';
echo $one->getRatio();
echo '<br>';
$two = new Circle(1);
echo $two->getSquare();
echo '<br>';
echo $two->getPerimeter();
echo '<br>';
echo $two->getRatio();
echo '<br>';
echo $two->getSquarePerimeterSum();