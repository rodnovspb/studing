<?php


class Employee{
    public $name;
    public $age;
    public $salary;
    public function __construct($name, $age, $salary){
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }
}

$one = new Employee('Den', 35, 3000);
echo $one->salary;