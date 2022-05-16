<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Region;

class Worker extends Model
{
    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }
    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }
}
