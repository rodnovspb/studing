<?php


class Loader
{
    public $funcSuccess;
    public function load($data){
        ($this->funcSuccess)($data);
    }
}