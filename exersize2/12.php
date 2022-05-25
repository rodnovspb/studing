<?php

class Car {
    public $tank;

    public function fill($a){
        $this->tank += $a;
        return $this;
    }

    public function ride($km){
        $spent = 10*$km;
        $this->tank -= $spent;
        return $this;
    }

    public function getTank(){
        return $this->tank;
    }
}

$auto = new Car;
echo $auto->fill(100)->ride(5)->getTank();