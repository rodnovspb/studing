<?php

class City {
    public $name;
    public $population;
    public function __construct($name,$population)
    {
        $this->name=$name;
        $this->population=$population;
    }
}

$one = new City('Moscow', 20000000);
$two = new City('SPb', 8000000);
$three = new City('Chlb', 1500000);
$four = new City('Astrakh', 1000000);
$five = new City('Krasn', 2000000);

$arr=[$one, $two, $three, $four, $five];

foreach ($arr as $elem){
    echo "<p>$elem->name&nbsp;$elem->population</p>";
}