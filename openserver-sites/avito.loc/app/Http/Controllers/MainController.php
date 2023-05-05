<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        try {

            self::func();
        } catch (\Exception $e){
                echo 'LogicException';
        } catch (\Exception $e){
                echo 'Exception';
        }


        return view('pages.index');
    }

    public static function func(){
        throw new \LogicException('ошибка');
    }
}
