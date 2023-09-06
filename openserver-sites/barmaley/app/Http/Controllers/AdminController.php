<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function show_cabinet()
    {
        $bills = Bill::query()->orderBy('id', 'asc')->simplePaginate(5);
        return view('cabinet', compact('bills'));
    }

    public function save(Request $request)
    {
        $arr = $request->post();
        $arr = str_replace(',', '.', $arr);
        $bill = Bill::query()->create($arr);
        return redirect()->back();
    }
}



















