<?php


namespace App\MyClasses;


class MyClass
{
   public $obj;
   public function __construct(SmsClass $smsClass)
   {
       $this->obj =  $smsClass;
   }

}
