<?php

namespace App\Models;



use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

//    protected $visible = ['id', 'name'];



    public function getIsAdminAttribute()
    {
        $this->attributes['is_admin'] = 'yes';
        return $this->attributes['is_admin'];
    }


//    protected $hidden = ['name', 'email'];

//    public function getNameAttribute($name) {
//        return strtoupper($name);
//    }
//
//    public function getFullNameAttribute(){
//        return "{$this->name} {$this->password}";}
//
//    public function setMyWordAttribute($value){
//        dd($this->attributes);
//        $this->attributes['name'] = $value;
//    }



}
