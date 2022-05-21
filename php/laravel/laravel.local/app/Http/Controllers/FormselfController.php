<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormselfController extends Controller
{
    public function formself(Request $request){
//        $data = $request->all();
          $data = $request->only(['city', 'country']);
        if(isset($data['city']) and isset($data['country'])){
            return view('formself.formself', [
                'arr' => $data
            ]);
        } else {
            return view('formself.formself');
        }
    }
}
