<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function searchByCategory(Category $category)
    {
        $latestCategories = Category::where('is_active',1)->orderBy('id','asc')->limit(10)->pluck('name','id');
        return view('frontend.search_by_category',compact('category','latestCategories'));
    }

    public function addToCart(Food $food)
    {
        if(DB::table('carts')->where('user_id','=', Auth::user()->id)->where('food_id','=',$food->id)->first())
        {
            return redirect()->back()->withErrors("$food->name has already added in the cart");
        }
        DB::table('carts')->insert([
            'user_id' => Auth::user()->id,
            'food_id' => $food->id
        ]);
        return redirect()->back()->withSuccess("$food->name is added to the cart");
    }

    public function cart()
    {
        $latestCategories = Category::where('is_active',1)->orderBy('id','asc')->limit(10)->pluck('name','id');

        $foodIdsInCart = Cart::where('user_id','=', Auth::user()->id)->pluck('food_id');

        return view('frontend.cart',compact('latestCategories','foodIdsInCart'));
    }
}
