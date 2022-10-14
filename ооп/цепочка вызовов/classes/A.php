<?php
namespace classes;

class A
{
    public $a = 5;
    
    public function sum(){
        $this->a = $this->a + $this->a;
        
        return $this;
    }
    
    public function sq(){
        $this->a = $this->a + $this->a;
        $this->a = $this->a * $this->a;
        return $this;
    }
    
}