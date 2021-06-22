<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name_on_card',
        'card_number',
        'mm_yy',
        'security_code',
        'postal_code',
        'is_active',
        'created_by',
        'updated_by',
    ];
}
