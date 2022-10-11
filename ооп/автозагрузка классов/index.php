<?php



spl_autoload_register('load');

function load($class) {
    $path = __DIR__ . "/classes/{$class}.php";
    if(file_exists($path)) {
        require_once $path;
    }
    
}

$book = new Book;

echo $book->book;