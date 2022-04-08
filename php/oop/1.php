<?php

class User {
    private $name;
    private $age;
    public function __construct($name, $age)
    {
        $this->name=$name;
        $this->age=$age;
    }
    public function __toString()
    {
        return $this->name;
    }

    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

$one = new User("Den", 35);

echo $one;

