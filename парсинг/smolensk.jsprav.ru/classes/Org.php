<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Org extends Eloquent
{
    protected $table = 'orgs';
    protected $guarded = [];
    public $timestamps = false;

}
