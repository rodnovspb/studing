<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Content extends Eloquent
{
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'content';
    
}