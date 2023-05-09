<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


class MainController extends Controller
{

    public function index()
    {
//       Product::create([
//           'name' => '111',
//           'date' => now(),
//       ]);

        try {
            Product::query()->findOrFail(1111)->date;
        } catch (\Exception $exception){
            dd($exception);
        }


    }

}
