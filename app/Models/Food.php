<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Food extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'category_id',
        'restaurant_id',
        'description',
        'price',
        'discount_in_percent',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public static function foodCountInSession()
    {
        if(request()->session()->has('food_ids')){
            $food_ids = request()->session()->get('food_ids');
            return count($food_ids);
        }
        return 0;
    }

    public static function foodTotalPriceInSession()
    {
        if(request()->session()->has('food_ids')){
            $total_price = 0;
            
            $allFood_id = Session::get('food_ids');

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
        }
        return 0;
    }

    public static function foodImageAsItem($food_id)
    {
        $food = Self::find($food_id);

        isset($food->getMedia('images')[0]) ? $image_url = $food->getMedia('images')[0]->getFullUrl() : $image_url = '';
        
        return  $image_url !== '' ? $image_url : asset('ui/frontend/img/photo_NA_110_110.png');
    }
}
