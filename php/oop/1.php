<?php



class City {
    public $name;
    public $foundation;
    public $population;
    public function __construct($name, $foundation, $population)
    {
        $this->name=$name;
        $this->foundation=$foundation;
        $this->population=$population;
    }
}

$one=new City('Moscow', 1235, '20 bil');
$props=['name', 'foundation', 'population'];
foreach ($props as $prop){
    echo $one->$prop;
}
