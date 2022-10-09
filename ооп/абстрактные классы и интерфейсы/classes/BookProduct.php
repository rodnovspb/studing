<?php

class BookProduct extends Product implements i3D
{
    public  $author;
    
    public function __construct($name, $price, $author)
    {
        parent::__construct($name, $price);
        $this->author = $author;
        $this->setDiscount(5);
        
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getProduct() {
        $out = parent::getProduct();
        $out .= "Автор: {$this->author}<br>";
        $out .= "Цена без скидки: {$this->price}<br>";
        $out .= "Скидка: {$this->getDiscount()}<br>";
        return $out;
    }
    
    public function addProduct($name, $price)
    {
    
    }
    
    public function test()
    {
        var_dump(self::TEST2);
    }
}