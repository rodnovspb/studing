<?php



class Employee {
    public $name;
    public $salary;
    public function double(){
        $this->salary**=2;
    }
}

$one = new Employee;
$one->salary=25;
$one->double();
echo $one->salary;