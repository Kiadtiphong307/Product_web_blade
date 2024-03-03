<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'name',
        'image',
        'order_id',
        'price',
        'stock',
        'total',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
