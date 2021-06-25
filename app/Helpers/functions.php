<?php
    function latestCategories()
    {
        return $latestCategories = App\Models\Category::where('is_active',1)->orderBy('id','asc')->limit(10)->pluck('name','id');
    }

    function restaurants()
    {
       return $restaurants = App\Models\Restaurant::where('is_active',1)->pluck('name','id');
    }

    function categories()
    {
       return $categories = App\Models\Category::where('is_active',1)->pluck('name','id');
    }