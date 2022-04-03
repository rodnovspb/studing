<?php
class Product {
    private $name;
    private $price;
    private $quantity;
    public function __construct($name, $price, $quantity)
    {
        $this->name=$name;
        $this->price=$price;
        $this->quantity=$quantity;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getCost(){
        return $this->quantity*$this->price;
    }
}
class Cart {
    private $products=[];
    public function getProducts(){
        return $this->products;
    }
    public function add($prod){
        $this->products[] = $prod;
    }
    public function remove($nameOfProd){
        $count = count($this->products);
        for($i=0; $i<$count; $i++){
            if($this->products[$i]->getName() == $nameOfProd){
                unset($this->products[$i]);
            }
        }
    }
    public function getTotalCost(){
        $sum = 0;
        foreach ($this->products as $item){
            $sum+=$item->getCost();
        }
        return $sum;
    }
    public function getTotalQuantity(){
        $sum=0;
        foreach ($this->getProducts() as $item){
            $sum+=$item->getQuantity();
        }
        return $sum;
    }
    public function getAvgPrice(){
        return $this->getTotalCost()/$this->getTotalQuantity();
    }
}

$one = new Cart;
$one->add(new Product('Соль', 10, 20));
$one->add(new Product('Сахар', 20, 30));
$one->add(new Product('Перец', 30, 40));

echo $one->getTotalQuantity();
