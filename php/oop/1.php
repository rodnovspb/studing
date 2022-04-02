<?php
class User {
    private $name;
    private $age;
    public function setName($var){
        if(strlen($var)>3) $this->name=$var;
    }
    public function setAge($var){
        if($var>17) $this->age=$var;
    }
    public function getName(){
        echo $this->name;
    }
    public function getAge(){
        echo $this->age;
    }
}

class Student extends User {
    public function setAge($var)
    {
        if($var<=25) parent::setAge($var);
    }
    public function setName($var)
    {
       if(strlen($var)<10) parent::setName($var);
    }
}

$one = new Student;
$one->setName('qqwwwwwwwwwq');
echo $one->getName();