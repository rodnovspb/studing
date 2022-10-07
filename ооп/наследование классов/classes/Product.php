<?php


class Product
{
    public $name;
    public $price;
    
    public function __construct($name, $price)
    {
         $this->name = $name;
         $this->price = $price;
    }
    
    public function getProduct() {
        return  "<b>О товаре</b><br>Наименование: {$this->name}<br>Цена: {$this->price}<br>";
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
}