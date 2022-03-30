<?php


class Student{
    public $name;
    public $course;
    public function transferToNextCourse(){
        if($this->isCorrect($this->course+1)) $this->course++;
        else $this->course=5;
    }
    private function isCorrect($num){
        if($num<=5) return true;
        else return false;
    }
}

$one = new Student;
$one->course=3;
$one->transferToNextCourse();
echo $one->course;
