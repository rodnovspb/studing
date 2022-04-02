<?php
class User {
    private $name;
    private $surname;
    private $burthday;
    private $age;
    public function __construct($name, $surname, $burthday)
    {
        $this->name=$name;
        $this->surname=$surname;
        if(preg_match('/^(\d{4}|\d{2})-(\d{2}|\d)-(\d{2}|\d)$/', $burthday)) {
            $this->burthday = $burthday;
        }
        $this->age=$this->calculateAge($this->burthday);
    }
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getBirth(){
        return $this->burthday;
    }
    public function getAge(){
        return $this->age;
    }
    private function calculateAge($var){
        $now = time();
        return floor(($now-strtotime($var))/60/60/24/360);
    }
}

class Employee extends User{
    private $salary;
    public function __construct($name, $surname, $burthday, $salary){
        parent::__construct($name, $surname, $burthday);
        $this->salary = $salary;
    }
    public function getSalary(){
        return $this->salary;
    }
}

$one=new Employee('Den', "ew", '1986-10-14', 3000);
echo $one->getSalary();
