<?php
error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/NotebookProduct.php';
require_once 'classes/BookProduct.php';
require_once 'show.php';


$book = new BookProduct("Три мушкетера", 200, 'Дюма');

$book->discount = 50;

show($book);
show($book->getProduct());
show($book->getDiscount());








