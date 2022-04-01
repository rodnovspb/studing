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

class Student extends User {
    private $course;
    public function setCourse($num){
        $this->course=$num;
    }
    public function getCourse(){
        return $this->course;
    }
}

$two = new Student;
$two->setName('Olya');
echo $two->getName();
$two->setCourse(5);
echo $two->getCourse();

class StudentRussia extends Student {
    private $nationality;
    public function setNat($num){
        $this->nationality=$num;
    }
    public function getNat(){
        return $this->nationality;
    }
}

$three = new StudentRussia;
$three->setName('Vasya');
echo $three->getName();