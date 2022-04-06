<?php



abstract class User {
    private $name;
    public function setName($var){
        $this->name=$var;
    }
    public function getName(){
        return $this->name;
    }
    abstract public function increaseRevenue($value);
    abstract public function decreaseRevenue($value);
}

class Employee extends User {
    private $salary;
    public function setSalary ($var){
        $this->salary=$var;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function increaseRevenue($value)
    {
        $this->salary=$this->salary+$value;
    }
    public function decreaseRevenue($value)
    {
        $this->salary=$this->salary-$value;
    }
}

class Student extends User {
    private $scholarship;
    public function setSchol($var){
        $this->scholarship=$var;
    }
    public function getSchol(){
        return $this->scholarship;
    }
    public function increaseRevenue($value)
    {
        $this->scholarship =  $this->scholarship + $value;
    }
    public function decreaseRevenue($value)
    {
        $this->scholarship=$this->scholarship-$value;
    }
}

$one = new Student;
$one->setSchol(1000);
$one->increaseRevenue(500);
echo $one->getSchol();