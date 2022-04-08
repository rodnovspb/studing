<?php

trait Trait1 {
    private function method () {
        return 1;
    }
}

trait Trait2 {
    private function method () {
        return 2;
    }
}

trait Trait3 {
    private function method () {
        return 3;
    }
}

class Test {
    use Trait1, Trait2, Trait3 {
        Trait2::method insteadof Trait1;
        Trait3::method insteadof Trait2;
        Trait3::method as method3;
        Trait2::method as method2;
        Trait1::method as method1;
    }
    public function getSum(){
        return $this->method1() + $this->method2() + $this->method3();
    }
}

$one = new Test;
echo $one->getSum();

