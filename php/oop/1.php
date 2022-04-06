<?php

interface iProgrammer {
    public function __construct($name, $salary);
    public function getName();
    public function getSalary();
    public function addLangs($lang);
    public function getLangs();
}

class Employee {
    private $name;
    private $salary;
    public function __construct($name, $salary)
    {
        $this->name=$name;
        $this->salary=$salary;
    }
    public function getName(){
        return $this->name;
    }
    public function getSalary(){
        return $this->salary;
    }
}

class Programmer extends Employee implements iProgrammer {
    private $langs=[];
    public function addLangs($lang)
    {
        $this->langs[]=$lang;
    }
    public function getLangs()
    {
        return $this->langs;
    }
}

$one = new Programmer('Den', 5000);
$one->addLangs('php');
$one->addLangs('js');
echo $one->getLangs();
echo $one->getSalary();