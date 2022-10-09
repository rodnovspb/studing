<?php
error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/i3D.php';
require_once 'classes/BookProduct.php';
require_once 'show.php';


$book = new BookProduct("Три мушкетера", 200, 'Дюма');


show($book);

class A{};
class B extends A{};
class C{};

$a = new A;
$b = new B;
$c = new C;

function offerCase($product) {
    echo "<p>Предлагаем чехол</p>";
}



