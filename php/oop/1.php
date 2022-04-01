<?php

class Employee{
    private $name;
    private $age;
    public function setName($var){
        $this->name=$var;
    }
    public function setAge($var){
        $this->age=$var;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

class Programmer extends Employee {
    private $langs;
    public function setLangs($arr){
        $this->langs=$arr;
    }
    public function getLangs(){
        return $this->langs;
    }
}
class Driver extends Employee{
    private $experience;
    private $cat;
    public function setExp($var){
        $this->experience=$var;
    }
    public function setCat($var){
        $this->cat=$var;
    }
    public function getExp(){
        return $this->experience;
    }
    public function getCat(){
        return $this->cat;
    }
}

$man = new Driver;
$man->setName('Lenya');
$man->setCat(5);

echo $man->getName();
echo $man->getCat();