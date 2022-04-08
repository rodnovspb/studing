<?php

trait Trait1 {
    private function met1() {
        return 1;
    }
}

trait Trait2 {
    private function met2() {
        return 2;
    }
}

trait Trait3 {
    use Trait1, Trait2;
    private function met3() {
        return 3;
    }
}

class User {
    use Trait3;
    public function getSum(){
        return $this->met1()+$this->met2()+$this->met3();
    }
}

$one = new User;
echo $one->getSum();