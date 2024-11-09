<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'product_name',
        'description',
        'price',
        'stock',
        'image',
        'category',
        'region',
    ];

}