<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Page extends Eloquent
{
    protected $guarded = [];
    public $timestamps = false;
    
    public $name = '111';

}