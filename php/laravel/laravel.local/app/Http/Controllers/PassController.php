<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PassController extends Controller
{
    public function pass(){
        return bcrypt(12345);
    }

    public function crypt($str){
        return Crypt::encrypt($str);
    }
    public function decrypt($str){
        try{
            return Crypt::decrypt($str);
        } catch (DecryptException $e){
            echo $e;
        }

    }
}
