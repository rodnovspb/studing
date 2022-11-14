<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request){

        $productsQuery = Product::with('category');
        if($request->filled('price_from')){
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'recommend', 'new'] as $field) {
            if($request->has($field)){
                $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate(6)->withPath('?' . $request->getQueryString());
        return view('index', compact('products'));
    }

    public function categories(){
        $categories = Category::query()->get();
        return view('categories', compact('categories'));
    }

    public function category($code){
        $category = Category::query()->where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $productCode){
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
        return view('product', compact('product'));
    }

    public function changeLocale($locale) {
        session(['locale'=>$locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function subscribe(SubscriptionRequest $request, Product $product) {
        Subscription::query()->create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', 'Мы свяжемся как товар прибудет');
    }

}
