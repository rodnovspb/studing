<?php



class Employee {
    public $name;
    public $age;
    public $salary;
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function checkAge(){
        return $this->age>18;
    }
}

$one = new Employee;

$one->salary=1000;
$one->age=25;

$two = new Employee;
$two->salary=2000;
$two->age=17;

echo $one->salary + $two->salary;