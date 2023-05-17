<?php

namespace App\Http\Controllers;



use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Meilisearch\Client;

use function Illuminate\Events\queueable;


class MainController extends Controller
{

    public function index()
    {

        $client = new Client(config('scout.meilisearch.host'), config('scout.meilisearch.key'));

        $prods = Product::all()->toArray();
        $client->index('prods')->addDocuments($prods);


        $products = Product::search('Вот какой был Ноздрев!')->get();

//        dd($client->index('prods')->search('вызолоченные'));
        return view('pages.index', compact('products'));
    }













}
