<?php
error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/i3D.php';
require_once 'classes/BookProduct.php';
require_once 'show.php';


$book = new BookProduct("Три мушкетера", 200, 'Дюма');

show($book);

function offerCase(Product $book) {
    echo "<p>Предлагаем чехол {$book->getAuthor()}</p>";
}

offerCase($book);

