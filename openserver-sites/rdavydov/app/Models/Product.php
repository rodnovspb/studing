<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'code', 'description', 'image', 'price', 'new', 'hit', 'recommend'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function isHit() {
        return $this->hit == 1;
    }

    public function isNew() {
        return $this->new == 1;
    }

    public function isRecommend() {
        return $this->recommend == 1;
    }

    public function setNewAttribute($value) {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value) {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value) {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }
}
