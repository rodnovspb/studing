<?php



class Rectangle{
    public $width;
    public $height;
    public function getSquare(){
        echo $this->height*$this->width;
    }
    public function getPer(){
        echo ($this->width+$this->height)*2;
    }
}

$one = new Rectangle;
$one->height=20;
$one->width=30;
$one->getSquare();