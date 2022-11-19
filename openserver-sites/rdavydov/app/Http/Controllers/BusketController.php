<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusketController extends Controller
{
    public function basket(){

        $order = (new Basket())->getOrder();

        return view('basket', compact('order'));
    }

    public function basketPlace(){

        $order = (new Basket())->getOrder();

        return view('order', compact('order'));
    }

    public function basketAdd($productId) {
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::query()->create();
            session(['orderId'=> $order->id]);
        } else {
            $order = Order::query()->findOrFail($orderId);
        }

        if($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        $product =  Product::query()->findOrFail($productId);


        Order::changeFullSum($product->price);

        session()->flash('success', "В корзину добавлен " . $product->name);
        return redirect()->route('basket');
    }

    public function basketRemove($productId) {

        (new Basket())->removeProduct($productId);

        $product = Product::query()->findOrFail($productId);

        session()->flash('warning', "Удален товар " . $product->name);
        return redirect()->route('basket');
    }

    public function basketConfirm(Request $request){

        $email = Auth::check() ? Auth::user()->email : $request->email;

        if((new Basket())->saveOrder($request->name, $request->phone, $email)){
            session()->flash('success', __('basket.your_order_confirmed'));
        } else {
            session()->flash('warning', 'Произошла ошибка');
        }

        Order::eraseOrderSum();

        return redirect()->route('index');
    }
}
