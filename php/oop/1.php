<?php

class Arr {
    private $numbers = [];
    public function add($num) {
        $this->numbers[]=$num;
        return $this;
    }
    function __toString()
    {
        return (string)array_sum($this->numbers);
    }
}

$arr = new Arr;

$arr->add(1)->add(2)->add(3);
echo $arr;