<?php

trait Trait1 {
    private function met1 (){
        return 3;
    }
}

class Test {
    use Trait1 {
        Trait1::met1 as public;
    }
}

$one = new Test;
echo $one->met1();

