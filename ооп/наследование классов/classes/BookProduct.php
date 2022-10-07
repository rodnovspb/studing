<?php


class BookProduct extends Product
{
    public  $author;
    
    public function __construct($name, $price, $author)
    {
        parent::__construct($name, $price);
        $this->author = $author;
        
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getProduct() {
        $out = parent::getProduct();
        $out .= "Автор: {$this->author}<br>";
        return $out;
    }
}