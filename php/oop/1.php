<?php
class User {
    private $name;
    private  $age;
    public function __construct($name, $age)
    {
       $this->name=$name;
       $this->age=$age;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

class Student extends User {
    private $course;
    public function __construct($name, $age, $course)
    {
        parent::__construct($name, $age);
        $this->course=$course;
    }
    public function getCourse(){
        return $this->course;
    }
}

$student = new Student('john', 19, 2);