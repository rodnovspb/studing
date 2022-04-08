<?php

trait Trait1 {
    private $a=1;
}

class Test {
    use Trait1;
    public function get(){
        return $this->a;
    }
}

$one = new Test;
echo $one->get();

