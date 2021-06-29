<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Restaurant;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    private $generalService;

    public function __construct(GeneralService $generalService)
    {
        $this->generalService = $generalService;
    }
    public function searchByCategory(Category $category)
    {
        return view('frontend.search_by_category',compact('category'));
    }

    public function searchByRestaurant(Request $request)
    {
        $request->validate([
            'ref' => 'required | integer'
        ]);
        $restaurant = Restaurant::find($request->ref);

        return view('frontend.search_by_restaurant',compact('restaurant'));
    }

    public function addToCart(Food $food)
    {
        $food_ids =  $this->generalService->addToCart($food);

        return response()->json([
            'food_ids' => Session::get('food_ids'),
            'food_count' => Food::foodCountInSession(),
            'food_total_price' => Food::foodTotalPriceInSession(),
        ]);
    }

    public function cart()
    {
        $foodIdsInCart = Session::get('food_ids',[]);

        return view('frontend.cart',compact('foodIdsInCart'));
    }

    public function cartCheckout()
    {
        $foodIdsInCart = Session::get('food_ids',[]);
        
        return view('frontend.checkout',compact('foodIdsInCart'));
    }

    public function order(Request $request){

        $output = $this->generalService->order($request);

        if($output){
            return Redirect::route('frontend.index')->withSuccess('Your order has successfully placed');
        }
        else{
            return Redirect::back(500)->withErrors('Sorry. We can not accept any order.System error');
        }
    }

}
