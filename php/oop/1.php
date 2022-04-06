<?php

interface Figure {
    public function getSquare();
}

class Quadrate implements Figure {
    private $a;
    public function __construct($a)
    {
        $this->a=$a;
    }
    public function getSquare()
    {
        return $this->a**2;
    }
}

$one = new Quadrate(1);
$one1 = new Quadrate(1);
$one2 = new Quadrate(1);

$coll = new FigureCollection;
$coll->add($one);
$coll->add($one1);
$coll->add($one2);
echo $coll->getTotalSquare();

class FigureCollection {
    private $figures = [];
    public function add(Figure $figure) {
        $this->figures[]=$figure;
    }
    public function getTotalSquare (){
        $sum=0;
        foreach ($this->figures as $figure) {
            $sum+=$figure->getSquare();
        }
        return $sum;
    }
}