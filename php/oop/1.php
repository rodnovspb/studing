<?php


trait Helper {
    private $name;
    private $age;
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

class City {
    use Helper;
    private $population;
    public function __construct($name, $age, $population)
    {
        $this->name=$name;
        $this->population=$population;
        $this->age=$age;
    }
    public function getPopulation(){
        return$this->population;
    }
}

$one = new City('Chel', 300, 1000000);
echo $one->getName();