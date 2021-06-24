<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function frontendIndex()
    {
        $categories = Category::where('is_active',1)->pluck('name','id');
        $restaurants = Restaurant::where('is_active',1)->pluck('name','id');
        $latestCategories = Category::where('is_active',1)->orderBy('id','asc')->limit(10)->pluck('name','id');
        return view('frontend.index',compact('categories','latestCategories', 'restaurants'));
    }

    public function backendIndex()
    {
        return view('backend.dashboard.index');
    }
}
