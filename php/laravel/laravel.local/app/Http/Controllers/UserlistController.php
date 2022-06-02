<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserlistController extends Controller
{
    public function form(){
       return view('userlist.form');
    }

    public function add(Request $request){
        $arr = $request->all();
        $id = DB::table('users')->insertGetId([
           'name' => $arr['name'],
           'email' => $arr['email'],
           'age' => $arr['age'],
           'salary' => $arr['salary'],
           'city_id' => 1,
        ]);
        if(!empty($id)){
            return redirect()->action([UserlistController::class, 'userlist']);
        } else {
            echo 'не вставлено';
        }
    }

    public function userlist(){
        $users = DB::table('users')->get();
        return view('userlist.userlist', [
            'users' => $users,
        ]);
//        return redirect()->route('success');
    }

    public function success(){
        echo 'успешно';
    }

    public function param($var){
        return redirect()->route('showparam', ['param'=>$var]);
    }

    public function showparam(Request $request){
        $var = $request->input('param');
        return "Передан параметр $var";
    }
}
