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

class EmployeesCollection {
    private $employees = [];
    public function add($var){
        if(!($this->isExist($var, $this->employees))){
            $this->employees[]=$var;
        };
    }
    public function get(){
        return $this->employees;
    }
    private function isExist($newVar, $vars){
        foreach ($vars as $var){
            if(in_array($newVar, $vars)) return true;
        }
        return false;
    }
}

$collection = new EmployeesCollection;

$collection->add(new Employee('Den', 3000));
$collection->add(new Employee('Den', 3000));
$collection->add(new Employee('Den', 3000));


echo "<pre>";
print_r($collection->get());
echo "</pre>";