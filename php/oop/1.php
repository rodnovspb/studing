<?php

class User{
    protected $name;
    protected function setName($var){
        $this->name=$var;
    }
    protected function getName(){
        return $this->name;
    }
}

class Driver extends User {


}

$one = new Driver;
$one->setItem('QWQEWQE');
$one->getItem();


