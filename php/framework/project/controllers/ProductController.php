<?php

namespace Project\Controllers;
use \Core\Controller;

class ProductController extends Controller {
    private $products;
    public function __construct()
    {
        $this->products = [
            1 => [
                'name'     => 'product1',
                'price'    => 100,
                'quantity' => 5,
                'category' => 'category1',
            ],
            2 => [
                'name'     => 'product2',
                'price'    => 200,
                'quantity' => 6,
                'category' => 'category2',
            ],
            3 => [
                'name'     => 'product3',
                'price'    => 300,
                'quantity' => 7,
                'category' => 'category2',
            ],
            4 => [
                'name'     => 'product4',
                'price'    => 400,
                'quantity' => 8,
                'category' => 'category3',
            ],
            5 => [
                'name'     => 'product5',
                'price'    => 500,
                'quantity' => 9,
                'category' => 'category3',
            ],
        ];
    }
    public function show ($params){
        $this->title = 'Контроллер product, действие show';
        return $this->render('product/show', [
            'product'=>$this->products[$params['n']]['name'],
            'category'=>$this->products[$params['n']]['category'],
            'price'=>$this->products[$params['n']]['price'],
            'quantity'=>$this->products[$params['n']]['quantity'],
        ]);
    }
    public function showAll(){
        $this->title = 'Контроллер product, действие showAll';
        $data =  "<table><thead><tr><td>'name'</td><td>'price'</td><td>'quantity'</td><td>'category'</td></tr></thead><tbody>";
        foreach ($this->products as $product) {
            $data .= "<tr><td>$product[name]</td><td>$product[price]</td><td>$product[quantity]</td><td>$product[category]</td></tr>";
        }
        $data.="</tbody></table>";
        echo $data;
    }
}