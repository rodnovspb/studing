<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetController extends Controller
{
    public function reset() {
//        Artisan::call('migrate:fresh --seed');
        session()->flash('success', 'Проект как бы сброшен в начальное состояние');
        return redirect()->route('index');
    }
}
