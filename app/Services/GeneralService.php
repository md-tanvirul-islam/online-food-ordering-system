<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GeneralService
{
    public function addToCart($food)
    {
        if(request()->session()->has('food_ids')){
            $food_ids = request()->session()->get('food_ids');

            $food_ids[] = $food->id;

            request()->session()->forget('food_ids');
        }else
        {
            $food_ids = array();
            
            $food_ids[] = $food->id;
        }

        request()->session()->put('food_ids', $food_ids);

        return $food_ids;
    }

    public function order($request)
    {
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

            DB::commit();

            Session::forget('food_ids');

            return true;

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        } catch (\Throwable $e) {
            DB::rollback();
        }
    }
}