<?php

$_GET['name'] = 'dasd';

if(isset($_GET['name']) and !empty($_GET['name'])){
    $name = $_GET['name'];
    if(class_exists($name)) echo 'Класс существует';
    else echo 'Класс не существует';
}

class dasd {

}