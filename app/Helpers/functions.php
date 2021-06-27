<?php
   function latestCategories($number)
   {
      return $latestCategories = App\Models\Category::where('is_active',1)->orderBy('id','Desc')->limit($number)->pluck('name','id');
   }

   function latestFoods($number)
   {
      return $latestFoods = App\Models\Food::where('is_active',1)->orderBy('id','Desc')->limit($number)->get();
   }
   
   function latestFoodIds($number)
   {
      return $latestFoods = App\Models\Food::where('is_active',1)->orderBy('id','Desc')->limit($number)->pluck('id');
   }

   function topDiscountFoodIds($number)
   {
      return $latestFoods = App\Models\Food::where('is_active',1)->orderBy('discount_in_percent','Desc')->limit($number)->pluck('id');
   }

   function restaurants()
   {
      return $restaurants = App\Models\Restaurant::where('is_active',1)->pluck('name','id');
   }

   function categories()
   {
      return $categories = App\Models\Category::where('is_active',1)->pluck('name','id');
   }