<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index(){
        dump(config('services.mailgun.endpoint'));
        return view('home', ['res'=>'Денис']);
    }

    public function test(){
        return __METHOD__;
    }


}
