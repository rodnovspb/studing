<?php

trait Trait1 {
    public function method(){
        echo 44;
    }
}
trait Trait2 {
    public function method(){
        echo 2;
    }
}

class Test {
    use Trait1, Trait2 {
        Trait1::method insteadof Trait2;
        Trait1::method as met1;
        Trait2::method as met2;

    }
    public function __construct()
    {
        return $this->met1();
    }

}

$one = new Test;