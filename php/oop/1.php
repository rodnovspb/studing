<?php

class Elem {
    public function get(){
        echo 'существует';
    }
}

if(!empty($_GET['name']) and !empty($_GET['method'])) {
    $name = $_GET['name'];
    $method = $_GET['method'];
    if(class_exists($name)) {
        if(method_exists($name, $method)) {
            $one = new $name;
            $one->$method();
        }
    }
    else {
        echo 'нет';
    }
}