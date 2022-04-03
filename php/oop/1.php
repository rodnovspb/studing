<?php

class Employee {
    public $name;
    public $salary;
    public function __construct($name, $salary)
    {
        $this->name=$name;
        $this->salary=$salary;
    }
}

class Student {
    public $name;
    public $scholarship;
    public function __construct($name, $scholarship)
    {
        $this->name=$name;
        $this->scholarship=$scholarship;
    }
}

$arr =[new Employee('asd', 10), new Student('dasd', 24), new Employee('asd', 10), new Student('dasd', 14), new
Employee('ased', 10), new Student('dasrd', 24)];

$sumEm = 0;
$sumSt = 0;
foreach ($arr as $item){
    $item instanceof Employee ? $sumEm+=$item->salary: $sumEm+=0;
    $item instanceof Student ? $sumSt+=$item->scholarship: $sumSt+=0;
}

echo '$sumEm='.$sumEm;
echo "<br>";
echo '$sumSt='.$sumSt;