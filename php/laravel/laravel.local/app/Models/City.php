<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function countries(){
        return $this->belongsTo(Country::class, 'country_id');
    }

}
