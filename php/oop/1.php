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
$two = new Employee('Erich', 25, 1000);
$three = new Employee('Olga', 35, 1000);

echo $one->salary+$two->salary+$three->salary;