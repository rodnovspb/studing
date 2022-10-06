<?php


class Car
{
    public $color = 'black';
    public $speed = 300;
    
    public function getCarInfo(){
        return $this->wheels;
    }
    
    public function __construct($a, $b){
        $this->color = $a;
        $this->speed = $b;
    }
    
    public function __destruct()
    {
        var_dump($this);
    }
    
}