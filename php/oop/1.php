<?php

$arr = ['prop1', 'prop2','prop3','prop4'];

class User {
    public $prop1='1';
    public $prop3=2;
}

$one = new User;

foreach ($arr as $item){
    if(property_exists($one, $item)) {
        echo $one->$item;
    }
}