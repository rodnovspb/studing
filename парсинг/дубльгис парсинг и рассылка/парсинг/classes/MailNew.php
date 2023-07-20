<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class MailNew extends Eloquent {
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'emails_new';

}
