<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\MyClasses\MyClass;
use App\MyClasses\SmsClass;
use App\MyClasses\SMSRU;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

use stdClass;

use function Termwind\render;


class MainController extends Controller
{

    public function index()
    {
        $a = new SMSRU('F42F1F6B-E9DC-0497-BE58-CC17DD10FF0F');
        $data = new stdClass();

        $place = ['city' => 'Pokhara', 'country' =>'Nepal'];
        $obj = (object)$place;
        echo $obj->city;
    }






}
