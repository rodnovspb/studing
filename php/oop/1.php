<?php

class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($var)
    {
        return $this->$var;
    }
}

$one = new User('Den', 35);
echo $one->age1;