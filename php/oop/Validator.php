<?php

class Validator {
    public function isEmail($str){
        return (bool)(filter_var($str, FILTER_VALIDATE_EMAIL));
    }
    public function isDomain($str){
        return !!(preg_match('/^[0-9a-zа-яё_-]{1,50}\.[0-9a-zа-яё_-]{1,30}$/iu',
            $str));
    }
    public function inDange(int $num, int $from, int $to){
        return ($num >= $from and $num <= $to);
    }
    public function inLength(string $str, int $from, int $to) {
        return (strlen($str) >= $from and strlen($str) <= $to);
    }
}

$one = new Validator;
var_dump($one->inLength('asd', 1, 5));






