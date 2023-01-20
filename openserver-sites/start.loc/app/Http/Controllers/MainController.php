<?php

namespace App\Http\Controllers;

use App\Jobs\PrepareJob;
use App\Jobs\PublishMessage;
use App\Jobs\SendMessage;
use App\Mail\OrderShipped;
use App\Models\User;
use App\Notifications\OrderReady;
use Illuminate\Http\Request;


use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Throwable;

class MainController extends Controller
{
    public function index() {

        Bus::chain([
            new PrepareJob('Подготовка'),
            new PublishMessage('Публикация'),
            new SendMessage('Успешно'),
        ])->catch(function (Throwable $e){info($e);})->dispatch();


        return view('index');

    }








}
