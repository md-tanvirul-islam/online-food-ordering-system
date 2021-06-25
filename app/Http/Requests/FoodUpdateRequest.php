<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'category_id' => 'required|integer',
            'restaurant_id' => 'required|integer',
            'description' =>'nullable|string|max:500',
            'price' => 'required|string',
            'discount_in_percent' =>'required|string',
            'is_active'=>'required|in:0,1',
            'image' => 'image|max:5120|nullable'
        ];
    }
}
