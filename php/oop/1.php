<?php


class Employee {
    private $name;
    private $age;
    private $salary;
    public function __construct($name, $age, $salary){
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function setAge($var){
        $this->age=$var;
    }
    public function setSalary($var){
        $this->salary=$var;
    }
}

$one = new Employee('Den', 35, 5000);
$one->setSalary(7000);
echo $one->getSalary();