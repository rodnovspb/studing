<?php

class User {
    public $name;
    public $surname;
    public function __construct($name, $surname)
    {
        $this->name=$name;
        $this->surname=$surname;
    }
}

class Employee extends User {
    public $salary;
    public function __construct($name, $surname,  $salary)
    {
       parent::__construct($name, $surname);
       $this->salary=$salary;
    }
}
class City {
    public $name;
    public $population;
    public function __construct($name, $population)
    {
        $this->name=$name;
        $this->population=$population;
    }
}

$one = new User('Den', 'Rodnov');
$one1 = new User('Denis', 'Rodnovskiy');
$one2 = new User('Denya', 'Rodnovanin');
$two = new Employee('Sema', 'Dunin', 3000);
$two1 = new Employee('Semad', 'Duninr', 4000);
$two2 = new Employee('Semas', 'Duninq', 5000);
$three = new City('Mosq', 5000);
$three1 = new City('Dfds', 5500);
$three2 = new City('Werx', 300);
$arr = [$one, $one2, $two1, $three, $three2, $one1, $two, $two2, $three1];

foreach ($arr as $item){
    if($item instanceof User and !($item instanceof Employee)) echo $item->name . "<br>";
}