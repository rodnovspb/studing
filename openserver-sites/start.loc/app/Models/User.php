<?php

namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    protected $casts = [
        'name' => 'boolean'
    ];



}
