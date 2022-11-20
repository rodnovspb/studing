<?php

require_once 'vendor/autoload.php';
require 'show.php';

class_alias('\RedBeanPHP\R', '\R');

R::setup( 'mysql:host=localhost;dbname=lists',
    'root', '' );

$id = $_GET['id'];

$cities = R::getAll("SELECT * FROM city_ WHERE id_country = ?", [$id]);


show($cities, 1);







