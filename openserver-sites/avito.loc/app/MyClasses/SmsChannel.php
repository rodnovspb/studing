<?php


namespace App\MyClasses;


use App\Models\User;
use Illuminate\Notifications\Notification;
use stdClass;

class SmsChannel
{
    private $sender;

    public function __construct()
    {
        $this->sender = new SMSRU(config('sms.password'));
    }

    public function send(User $user, Notification $notification){
        $data = new stdClass();
        $data->to = '79507261797';
        $data->text = $notification->toSms();
        $sms = $this->sender->send_one($data);
    }

}
