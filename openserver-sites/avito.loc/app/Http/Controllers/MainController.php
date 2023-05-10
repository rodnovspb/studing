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
        $sms = new SMSRU('F42F1F6B-E9DC-0497-BE58-CC17DD10FF0F');
        $data = new stdClass();

        $data->to = '79507261797';
        $data->text = 'Привет';

        $sms = $sms->send_one($data);

        if ($sms->status == "OK") { // Запрос выполнен успешно
            echo "Сообщение отправлено успешно. ";
            echo "ID сообщения: $sms->sms_id. ";
            echo "Ваш новый баланс: $sms->balance";
        } else {
            echo "Сообщение не отправлено. ";
            echo "Код ошибки: $sms->status_code. ";
            echo "Текст ошибки: $sms->status_text.";
        }
    }






}
