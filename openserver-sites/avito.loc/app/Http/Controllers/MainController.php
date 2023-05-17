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

use PDOStatement;

use function Illuminate\Events\queueable;


class MainController extends Controller
{

    public function index()
    {
        $arr = [1, null, 2, false, 3, 0, '', ' '];

        var_dump(array_filter([1, null, 2, false, 3, 0, '', ' ']));


//        return view('pages.index');
    }













}
