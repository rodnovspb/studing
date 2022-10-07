<?php


class Car
{
    public $brand = 'BMW';
    public $color = 'black';
    public $speed = 300;
    const OWNER = 'Василий';
    const TEST_CAR_SPEED = 300;
    
    public static $countCar = 0;
    
    public function __construct() {
        Car::$countCar++;
    }
    
    public function getCarInfo(){
        return $this->brand;
    }
    
    public function getSpeed(){
        return self::TEST_CAR_SPEED;
    }
    
}