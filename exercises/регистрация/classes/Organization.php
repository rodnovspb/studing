<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Organization extends Eloquent {
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'organizations';

}
