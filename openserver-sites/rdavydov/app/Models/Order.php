<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function calculateFullSum(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function getFullSum() {
        return session('full_order_sum', 0);
    }

    public static function changeFullSum($changeSum) {
        $sum = self::getFullSum();
        $sum = $sum + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function eraseOrderSum() {
        session()->forget('full_order_sum');
    }

    public function saveOrder($name, $phone){
        if($this->status == 0){
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->update();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
