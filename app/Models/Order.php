<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'address',
        'phone',
        'image',
        'user_id',
        'product_id',
        'product_name',
        'price',
        'stock',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
