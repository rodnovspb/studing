<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\User;
use App\Notifications\OrderReady;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MainController extends Controller
{
    public function index() {
        $user = User::query()->find('120');

        Notification::route('mail', 'rodnovspb@mail.ru')->notify(new OrderReady($user));


        return view('index');


    }








}
