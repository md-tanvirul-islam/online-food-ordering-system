<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id'
    ];

    public static function authUserNoFood()
    {
        return self::where('user_id','=', Auth::user()->id)->count();
    }

    public static function priceAfterDiscount($food_id)
    {
        $food = Food::find($food_id);
        $discountPrice = round($food->price - ($food->price*($food->discount_in_percent/100)));
        return $discountPrice;
    }

    public static function authUserFoodTotalPrice()
    {
        $total_price = 0;
        $allFood_id = self::where('user_id','=', Auth::user()->id)->pluck('food_id');
        foreach($allFood_id as $food_id)
        {
            $food = Food::find($food_id); 
            if($food->discount_in_percent){
                $discountPrice = round($food->price - ($food->price*($food->discount_in_percent/100)));
                $total_price = $total_price + $discountPrice;
            }else
            {
                $total_price = $total_price + $food->price;
            }
        }
        return $total_price;

        //  
    } 
}
