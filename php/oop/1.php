<?php

interface iUser {
    public function setName($name);
    public function getName();
    public function setAge($age);
    public function getAge();
}

interface iEmployee extends iUser {
    public function setSalary($salary);
    public function getSalary();
}

class Employee implements iUser {
    private $name;
    private $age;
    private $salary;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
    public function getAge()
    {
        return $this->age;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$one=new Employee;
$one->setName('Den');
echo $one->getName();