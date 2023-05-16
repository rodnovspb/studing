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

use function Illuminate\Events\queueable;


class MainController extends Controller
{

    public function index()
    {
        try {
            $this->func();
        } catch (\Exception $exception){
            return redirect()->route('func1')->with('error', $exception->getMessage());
        }
        return view('pages.index');
    }

    public function func(){
        throw new \Exception('Ошибка');
    }

    public function func1(){
        return view('pages.index');
    }











}
