<?php
error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/NotebookProduct.php';
require_once 'classes/BookProduct.php';
require_once 'show.php';


$book = new BookProduct("Три мушкетера", 200, 'Дюма');

$notebook = new NotebookProduct("DELL", 20000, 'intel');



show($book->getProduct());
show($notebook->getProduct());





