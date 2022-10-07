<?php
error_reporting(-1);
require_once 'classes/Product.php';
require_once 'show.php';


$book = new Product("Три мушкетера", 200, null, 1000);

$notebook = new Product("DELL", 20000, 'intel');

show($book);
show($notebook);

show($book->getProduct('book'));
show($notebook->getProduct('notebook'));




