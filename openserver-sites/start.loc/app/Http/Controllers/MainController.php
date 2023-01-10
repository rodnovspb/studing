<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\Password;

class MainController extends Controller
{
    public function index(Request $request) {


            dd(collect([['a'=>1, 'b'=>2],['a'=>3, 'b'=>4]])->pipe(function ($coll){return $coll->sum();}));

//        return view('index')->with('eee', 333);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'min:5',
            'surname' => Password::min(5)->mixedCase(),
        ]);


        $user = Student::query()->create($request->all());

        if(!$user){
            session()->flash('error', 'Ошибка сохранения в БД');
        } else {
            session()->flash('success', 'Успешно');
        }

        return redirect()->route('main');
    }


}
