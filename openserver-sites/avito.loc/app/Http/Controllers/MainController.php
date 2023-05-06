<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Request;


class MainController extends Controller
{

    public function index(Request $request)
    {
//        $s = $request->s;
//        $request->validate([
//            's' => 'required',
//        ]);

        $s = 'профилактические товара';
        $products = Product::like($s)->paginate(20);
        return view('pages.index', compact('products', 's'));

    }

}
