<?php

namespace App\Models;


use App\Events\GoodDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Good extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    protected $fillable = ['name'];
    protected $attributes = ['name' => 'Денис',];

    public function scopeGetOldest($query, $date){
        return $query->where('date', '>', $date);
    }


    protected $dispatchesEvents = ['updated' => GoodDeleted::class];

//    protected static function booted()
//    {
//        static::updated(function ($good) {
//            dump($good->name);
//        });
//    }

}
