<?php

interface iUser {
    public function __construct($name, $age);
    public function getName();
    public function getAge();
}

class User implements iUser {
    private $name;
    private $age;
    public function __construct($name, $age)
    {
        $this->name=$name;
        $this->age=$age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
       return $this->age;
    }
}

$one = new User('Den', 35);
echo $one->getName();