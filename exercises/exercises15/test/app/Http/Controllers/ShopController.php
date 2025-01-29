<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function catalog()
    {
        return response()->json(Product::all());
    }

    public function createOrder(Request $request) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            $order = new Order();
            $order->order_number = uniqid();
            $order->status = 'pending';
            $order->customer_id = $request->customer_id;
            $order->total_price = 0;
            $order->save();

            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                if ($product->quantity < $item['quantity']) {
                    return response()->json(['error' => 'Недостаточно товара на складе'], 400);
                }

                $product->quantity -= $item['quantity'];
                $product->save();

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);


                $order->total_price += ($product->price * $item['quantity']);
            }


            $order->save();

            DB::commit();

            return response()->json($order, 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Ошибка при создании заказа'], 500);
        }
    }

    public function approveOrder(Request $request, int $id) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::with('customer')->findOrFail($id);

            if ($order->status !== 'pending') {
                return response()->json(['error' => 'Заказ уже утвержден или отменен'], 400);
            }

            $customer = $order->customer;

            if ($customer->balance < $order->total_price) {
                return response()->json(['error' => 'Недостаточно средств на балансе'], 400);
            }

            $customer->decrement('balance', $order->total_price);

            $order->status = 'approved';
            $order->save();

            DB::commit();

            return response()->json($order, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Ошибка при утверждении заказа'], 500);
        }
    }
}
