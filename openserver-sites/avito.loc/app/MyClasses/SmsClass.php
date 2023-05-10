<?php


namespace App\MyClasses;


class SmsClass
{
    public function send(){
        echo '<h1>Отправлено</h1>';
    }

    public function __construct()
    {
        // call Grandpa's constructor
        parent::__construct();
    }
}
