<?php


class User {
    private $name;
    private $age;
    public function __construct($name, $age){
        $this->age=$age;
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
    public function setAge($num){
        $this->age=$num;
    }
    public function getAge(){
        return $this->age;
    }
}

$one = new User('Den', 35);

echo $one->getName();
$one->setAge(36);
echo $one->getAge();