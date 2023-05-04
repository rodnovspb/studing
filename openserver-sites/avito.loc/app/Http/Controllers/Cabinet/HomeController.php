<?php
namespace App\Http\Controllers\Cabinet;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class HomeController
{
    public function index(){

        return view('cabinet.cabinet');

    }


}
