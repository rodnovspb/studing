<?php

interface iUser {
    public function setName($name);
    public function getName();
    public function setAge($age);
    public function getAge();
}

class User implements iUser {
    private $name;
    private $age;
    public function setName($name)
    {
       $this->name=$name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setAge($age)
    {
       $this->age=$age;
    }
    public function getAge()
    {
        return $this->age;
    }
}