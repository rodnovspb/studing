<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;


class MainController extends Controller
{

    public function index()
    {
//        Product::query()->forceCreate([
//            'name' => 'Товар',
//            'list' => [1,2,3],
//        ]);

        $product = Product::find(10);
        $product->list[0] = 555;
        $product->save();

//        $product = Product::query()->find(10)->list;
//
//        dd($product);

    }

}
