<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GeneralController extends Controller
{
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
        $foodIdsInCart = Cart::where('user_id','=', Auth::user()->id)->pluck('food_id');

        return view('frontend.cart',compact('foodIdsInCart'));
    }

    public function cartCheckout()
    {
        $authUser = Auth::user();
        
        $foodIdsInCart = Cart::where('user_id','=', Auth::user()->id)->pluck('food_id');

        return view('frontend.checkout',compact('authUser','foodIdsInCart'));
    }

    public function order(Request $request){
        DB::beginTransaction();
        try {
            if(!isset($request->diff_acc_check_box)){
                $address = json_encode([
                    'holding_no' => $request->holding_no,
                    'street' => $request->street,
                    'thana' => $request->thana,
                    'district' => $request->district,
                    'division' => $request->division,
                    'country' => $request->country,
                    'post_code' => $request->post_code,
                ]);

                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $address,
                    'subtotal' => Cart::authUserFoodTotalPrice(),
                    'total' => Cart::authUserFoodTotalPrice(),
                    'created_by' => Auth::user()->id,
                ]); 
            }else{
                $address = json_encode([
                    'holding_no' => $request->diff_holding_no,
                    'street' => $request->diff_street,
                    'thana' => $request->thana,
                    'district' => $request->diff_district,
                    'division' => $request->diff_division,
                    'country' => $request->diff_country,
                    'post_code' => $request->diff_post_code,
                ]);

                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'name' => $request->diff_name,
                    'email' => $request->diff_email,
                    'phone' => $request->diff_phone,
                    'address' => $address,
                    'subtotal' => Cart::authUserFoodTotalPrice(),
                    'total' => Cart::authUserFoodTotalPrice(),
                    'created_by' => Auth::user()->id,
                ]); 
            }

            $food_ids = Cart::where('user_id','=',Auth::user()->id)->pluck('food_id');

            foreach($food_ids as $food_id)
            {
                DB::table('food_order')->insert([
                    'order_id' => $order->id,
                    'food_id' => $food_id,
                ]);
            }

            Payment::create([
                'order_id' => $order->id,
                'name_on_card' => 'Food Order',
                'card_number' =>'14789',
                'mm_yy' => '02 / 24',
                'postal_code' => '1217',
                'created_by' => Auth::user()->id,
            ]);


            DB::table('carts')->where('user_id', '=', Auth::user()->id)->delete();

            DB::commit();

            return Redirect::route('frontend.index')->withSuccess('Your order has successfully placed');

        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // something went wrong
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e);
        }
    }
}
