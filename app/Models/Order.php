<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'subtotal',
        'coupon_code',
        'discount_in_amount',
        'total',
        'is_active',
        'created_by',
        'updated_by',
    ];
}
