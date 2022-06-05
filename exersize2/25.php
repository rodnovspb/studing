<?php


interface Car {
    public function setModel($a);
    public function getModel();
}

class miniCar implements Car {
    public $model;
    public function setModel($a)
    {
        $this->model = $a;
    }

    public function getModel()
    {
        echo $this->model;
    }
}

$obj = new miniCar;
$obj->setModel('mers');
$obj->getModel();