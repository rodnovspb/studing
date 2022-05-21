<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(){
        $arr = Account::all();
        return view('account.show', ['arr'=>$arr]);
    }



}
