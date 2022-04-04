<?php

class Test {
    public $prop1;
    public $prop2;
    private $prop3;
    private $prop4;
    public $vars=[];
    function __construct()
    {
        $this->vars=array_merge(get_class_vars(get_class($this)));
    }
}

$one = new Test;
var_dump($one->vars);
