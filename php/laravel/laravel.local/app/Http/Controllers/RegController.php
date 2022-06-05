<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegController extends Controller
{

    public function reg(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        if($validator->fails()) echo 'ошибка';
        return view('reg.reg');
    }

    public function sendToDB(Request $request){
            $validated = $request->validate([
//            'name'=> "nullable | max:255 | min:3 ",
//            'surname' => ['required', 'max:255', 'min:3'],
//            'pass' => ['required', 'max:255', 'min:3'],
            'password' => 'Password::min(8)->letters()',
//            'check' => 'accepted'
        ]);

        $str = new Reg;
        $str->name =  $request->name;
        $str->surname = $request->surname;
        $str->pass = $request->pass;
        $str->save();
        return 'добавлено успешно';
    }
}
