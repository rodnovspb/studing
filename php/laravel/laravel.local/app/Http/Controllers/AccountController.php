<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function show(){
        $account = Account::find(1);
        return view('account.show', ['account'=>$account]);


    }

}
