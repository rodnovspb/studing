<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class MailDubl extends Eloquent {
    protected $guarded = [];
    public $timestamps = false;
    public $table = 'emails_dubl';

}
