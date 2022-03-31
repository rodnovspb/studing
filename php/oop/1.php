<?php

class Student {
    private $name;
    private $course;
    public function __construct($name)
    {
        $this->name=$name;
        $this->course=1;
    }
    public function getName(){
        return $this->name;
    }
    public function getCourse(){
        return $this->course;
    }
    public function transferToNextCourse(){
        if($this->isCorrect($this->course)) $this->course++;
    }
    private function isCorrect($num){
        return $num<5;
    }
}

$one = new Student('Den');
echo $one->getCourse();
$one->transferToNextCourse();
echo $one->getCourse();