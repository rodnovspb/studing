<?php

class User{
    private $name;
    private $age;
    public function setName($name){
        $this->name=$name;
    }
    public function setAge($age){
        $this->age=$age;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

class Employee extends User{
    private $salary;
    public function setSalary($num){
        $this->salary=$num;
    }
    public function getSalary(){
        return $this->salary;
    }
}

$one=new Employee;
$one->setName('Den');
$one->setAge(35);
$one->setSalary(5000);

echo $one->getName()."<br>";
echo $one->getAge()."<br>";
echo $one->getSalary()."<br>";

