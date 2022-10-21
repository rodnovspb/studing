<?php

namespace app\models;
use wfm\Model;
use RedBeanPHP\R;


class Main extends Model
{
    public function get_names():array
    {
        return R::findAll('name');
    }

}