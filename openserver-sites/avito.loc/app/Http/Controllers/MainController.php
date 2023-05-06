<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\MyClasses\MyClass;
use Illuminate\Support\Facades\App;


class MainController extends Controller
{

    public function index()
    {
        throw new \Exception('Верифицировали');

        try {
            throw new \Exception('Верифицировали');
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }


        return view('pages.index');
    }

}
