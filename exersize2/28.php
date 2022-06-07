<?php


interface Inter {
    public function squqre($a, $b);
}

trait Tr {
    public function squqre($a, $b) {
        echo $a*$b;
    }
}

class Rectangle implements Inter {
    use Tr;
}

$obj = new Rectangle;
$obj->squqre(3,5);

var_dump($obj instanceof Inter) ;