<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;

class FormController extends Controller
{
    public function form(){
        return view('form.form');
    }

    public function result(Request $request){
        dd($request);

        return view('form.result', [
            'num1' => $request->input('num1'),
            'num2' => $request->input('num2'),
            'num3' => $request->input('num3'),
        ]);
    }

    public function formPost(){
        return view('form.formpost');
    }

    public function resultPost(Request $request){
        return view('form.resultpost', [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'salary' => $request->input('salary'),
        ]);
    }

}
