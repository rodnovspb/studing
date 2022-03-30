<?php


class Employee {
    private $name;
    private $age;
    private $salary;
    public function set($name, $age, $salary){
        $this->name=$name;
        if($this->isAgeCorrect($age)){
            $this->age=$age;
        }
        $this->salary=$salary;
    }
    public function get(){
        $arr=['name'=>$this->name, 'age'=>$this->age, 'salary'=>$this->salary];
        return $arr;
    }
    private function isAgeCorrect($num){
        return $num>=1 and $num<=100;
    }
}

$one=new Employee;
$one->set('Den', 55, 3000);

print_r($one->get());