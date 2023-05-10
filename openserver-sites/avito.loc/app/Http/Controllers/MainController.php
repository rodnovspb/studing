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
        $text = file_get_contents('https://docs.guzzlephp.org/en/stable/');
        echo $text;
    }






}
