<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'email'];

    public function scopeActiveByProductId($query, $productId) {
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function sendEmailBySubscription(Product $product) {
        $subscriptions = self::activeByProductId($product->id)->get();
        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));
            $subscription->status = 1;
            $subscription->save();
        }
    }
}
