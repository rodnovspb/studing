<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Mail extends Eloquent {
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'mails';

}
