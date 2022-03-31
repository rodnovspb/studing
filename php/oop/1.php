<?php

class Arr{
    private $numbers=[];
    public function add($arr){
        $this->numbers = array_merge($this->numbers, $arr);
    }
    public function get(){
        echo "<pre>";
        print_r($this->numbers);
        echo "</pre>";
    }
    public function getAvg(){
        return array_sum($this->numbers)/count($this->numbers);
    }
}

$one = new Arr;
$one->add([1,2,3,4]);
$one->add([1,2,3,4]);
$one->get();

echo $one->getAvg();