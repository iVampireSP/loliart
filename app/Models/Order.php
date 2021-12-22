<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'order_id', 'amount', 'amount_received', 'payment', 'comment', 'status', 'product',
        'product_id', 'user_id', 'team_id', 'metadata',
    ];

    protected $casts = [
        'metadata' => 'json',
    ];

    public static function setup($order_id, $amount, $product, $user_id = false)
    {
        if (!$user_id) {
            $user_id = auth()->id();
        }
        self::create([
            'name' => 'edge-stripe-' . time(),
            'order_id' => $order_id,
            'amount' => $amount,
            'product' => $product,
            'user_id' => $user_id,
        ]);
    }
}
