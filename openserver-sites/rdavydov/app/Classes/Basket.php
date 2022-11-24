<?php


namespace App\Classes;


use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class Basket
{

    protected $order;

    public function __construct()
    {
        $orderId = session('orderId');
        $this->order = Order::query()->findOrFail($orderId);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone, $email) {
        Mail::to($email)->send(new OrderCreated($name, $this));

        return $this->order->saveOrder($name, $phone);
    }

    public function removeProduct($productId) {
        if($this->order->products->contains($productId)) {
            $pivotRow = $this->order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2) {
                $this->order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product = Product::query()->findOrFail($productId);
        Order::changeFullSum(- $product->price);
    }


}
