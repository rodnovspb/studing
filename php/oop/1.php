<?php

class Test {
    public $prop1;
    public $prop2;
    private $prop3;
    private $prop4;
    public function getvars(){
        var_dump(get_object_vars($this));
    }

}

$one = new Test;
$one->getvars();
