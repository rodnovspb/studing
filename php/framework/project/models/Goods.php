<?php

namespace Project\Models;
use Core\Model;

class Goods extends Model {
    public function getOne($id){
        return $this->findOne("SELECT * FROM products WHERE id=$id");
    }
    public function getAll(){
        return $this->findMany("SELECT * FROM products");
    }
}