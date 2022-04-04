<?php

class User
{
    const MESSAGE = "privet";
    public function getCon(){
        echo self::MESSAGE;
    }
}

echo User::MESSAGE;

$one = new User;
$one->getCon();