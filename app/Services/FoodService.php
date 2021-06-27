<?php

namespace App\Services;

use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class FoodService
{
    public function store($data)
    {

        $food = Food::create([
        'name'                  => $data['name'],
        'category_id'           => $data['category_id'],
        'restaurant_id'         => $data['restaurant_id'],
        'description'           => $data['description'],
        'price'                 => $data['price'],
        'discount_in_percent'   => $data['discount_in_percent'],
        'is_active'             => $data['is_active'],
        'created_by'            => Auth::user()->id,
        ]);
        
        if(request()->hasFile('image') && request()->file('image')->isValid()){
            $food->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return $food;
    }

    public function update($data, $food)
    {
        $food->update([
            'name'                  => $data['name'],
            'category_id'           => $data['category_id'],
            'restaurant_id'         => $data['restaurant_id'],
            'description'           => $data['description'],
            'price'                 => $data['price'],
            'discount_in_percent'   => $data['discount_in_percent'],
            'is_active'             => $data['is_active'],
            'updated_by'            => Auth::user()->id,
        ]);  

        if(request()->hasFile('image') && request()->file('image')->isValid()){

            $media = $food->getMedia('images');
            
            if(isset($media[0])) $media[0]->delete();
        
            $food->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return $food;
    }
}