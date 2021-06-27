<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function store($data)
    {

        $category = Category::create([
        'name'                  => $data['name'],
        'description'           => $data['description'],
        'is_active'             => $data['is_active'],
        'created_by'            => Auth::user()->id,
        ]);
        
        if(request()->hasFile('image') && request()->file('image')->isValid()){
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return $category;
    }

    public function update($data, $category)
    {
        $category->update([
            'name'                  => $data['name'],
            'description'           => $data['description'],
            'is_active'             => $data['is_active'],
            'updated_by'            => Auth::user()->id,
        ]);  

        if(request()->hasFile('image') && request()->file('image')->isValid()){

            $media = $category->getMedia('images');
            
            if(isset($media[0])) $media[0]->delete();
        
            $category->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return $category;
    }
}