<?php


namespace App\MyClasses;


class MyClass
{
   public $obj;
   public function __construct(SmsClass $smsClass)
   {
       $this->obj =  $smsClass;
   }

   public function sendSms($var){
       $this->obj->send($var);
   }

}
