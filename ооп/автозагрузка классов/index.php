<?php

use pages\Book;

spl_autoload_register();

$book = new Book();

echo $book->book;


