<?php

interface iFigure3d {
    public function getVolume();
    public function getSurfaceSquare();
}

class Cube implements iFigure3d {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getVolume()
    {
        return $this->a**3;
    }
    public function getSurfaceSquare()
    {
        return $this->a**2*6;
    }
}

class Quadrate {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getSquare(){
        return $this->a**2;
    }
}

$quadrate1 = new Quadrate(1);
$quadrate2 = new Quadrate(1);
$quadrate3 = new Quadrate(1);

$cube1 = new Cube(1);
$cube2 = new Cube(1);
$cube3 = new Cube(1);

$arr = [$quadrate1, $quadrate2, $quadrate3, $cube1, $cube2, $cube3];
$sumVol=0;
$sumSquare=0;
foreach ($arr as $item){
    if($item instanceof iFigure3d) {
        $sumVol+=$item->getVolume();
    } elseif ($item instanceof Quadrate){
        $sumSquare+=$item->getSquare();
    }

}

echo $sumVol;
echo "<br>";
echo $sumSquare;