<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'name',
        'address',
        'phone',
        'image',
        'product_id',
        'product_name',
        'price',
        'stock',
        'total',
    ];
}
