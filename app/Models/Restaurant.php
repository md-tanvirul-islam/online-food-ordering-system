<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone_no',
        'alternative_phone_no',
        'telephone',
        'facebook_page_url',
        'youtube_channel_url',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
