<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    public $table = 'user';

    public function info() {
        return $this->hasOne(UserInfo::class);
    }

}
