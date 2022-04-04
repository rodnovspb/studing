<?php

class Test {
    public function method1 (){
        echo '1';
    }
    public function method2 (){
        echo '2';
    }
    public function method3 (){
        echo '3';
    }
}

$one = new Test;

$arr = get_class_methods($one);
foreach ($arr as $item){
    $one->$item();
}