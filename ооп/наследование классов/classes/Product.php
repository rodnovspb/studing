<?php


class Product
{
    public $name;
    public $price;
    
    public $cpu;
    public $numPages;
    
    public function __construct($name, $price, $cpu = null, $numPages = null)
    {
         $this->name = $name;
         $this->price = $price;
         $this->cpu = $cpu;
         $this->numPages = $numPages;
    }
    
    public function getCpu()
    {
        return $this->cpu;
    }
    
    public function getNumPages()
    {
        return $this->numPages;
    }
    
    public function getProduct($type = 'notebook') {
        $out = "<hr><b>О товаре</b><br>
                Наименование: {$this->name}<br>
                Цена: {$this->price}<br>";
        
        if($type === 'notebook') {
            $out .= "Процессор: {$this->cpu}<br>";
        } else {
            $out .= "Количество страниц: {$this->numPages}";
        }
        
        return $out;
    }
    
}