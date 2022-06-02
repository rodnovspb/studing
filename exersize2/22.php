<?php




abstract class Car {
    protected $model;
    protected $height;
    abstract public function calcTankVolume();

}

class BMW extends Car {
    protected $widthX;
    protected $widthY;

    public function __construct($model, $height, $widthX, $widthY)
    {
        $this->model = $model;
        $this->height = $height;
        $this->widthX = $widthX;
        $this->widthY = $widthY;
    }
    public function calcTankVolume (){
        return $this->height*$this->widthY*$this->widthX;
    }
}

class Mersedes extends Car {
    protected $radius;
    const PI = 3.14;

    public function __construct($model, $height, $radius)
    {
        $this->model = $model;
        $this->height = $height;
        $this->radius = $radius;
    }
    public function calcTankVolume() {
        return $this->height*self::PI*$this->radius**2;
    }
}

function calcCostFuel(Car $car, $cost) {
    echo $car->calcTankVolume()*$cost;
}

$bmw = new BMW('Q7', 1, 0.5, 0.5);
$mers = new Mersedes('Черный', 1, 0.5);
calcCostFuel($bmw, 1000);
echo "<pre>";
calcCostFuel($mers, 1000);

