<?php


class User{
    public $name;
    public $age;
    public function __construct($a, $b){
        $this->name=$a;
        $this->age=$b;
    }
}

$one = new User('Den', 25);
echo $one->name;