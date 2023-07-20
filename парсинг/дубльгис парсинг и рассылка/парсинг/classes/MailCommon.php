<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class MailCommon extends Eloquent {
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'emails_common';

}
