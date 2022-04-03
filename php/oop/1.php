<?php

class Employee
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

class Student
{
    private $name;
    private $scholarship; // стипендия

    public function __construct($name, $scholarship)
    {
        $this->name = $name;
        $this->scholarship = $scholarship;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScholarship()
    {
        return $this->scholarship;
    }
}

class UsersCollection {
    private $employee=[];
    private $students=[];
    public function add($var){
        if($var instanceof Employee) $this->employee[]=$var;
        if($var instanceof Student) $this->students[]=$var;
    }
    public function getSalary(){
        $sum=0;
        foreach ($this->employee as $item){
            $sum+=$item->getSalary();
        }
        return $sum;
    }
    public function getScholarship(){
        $sum=0;
        foreach ($this->students as $item){
            $sum+=$item->getScholarship();
        }
        return $sum;
    }
    public function getTotalMoney(){
        return $this->getScholarship() + $this->getSalary();
    }
}

$one = new UsersCollection;
$one->add(new Employee('dasd', 10));
$one->add(new Employee('dasd', 20));
$one->add(new Student('das', 40));
$one->add(new Student('daas', 30));

echo $one->getTotalMoney();