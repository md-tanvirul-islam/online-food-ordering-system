<?php

use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Routes for General ............
Route::get('/', [App\Http\Controllers\DashboardController::class, 'frontendIndex'])->name('frontend.index');
Route::get('category/{category}', [App\Http\Controllers\GeneralController::class, 'searchByCategory'])->name('searchBy.category');

Route::middleware(['auth'])->group(function () {
    Route::get('add_to_cart/{food}', [App\Http\Controllers\GeneralController::class, 'addToCart'])->name('add.to.cart');
    Route::get('cart', [App\Http\Controllers\GeneralController::class, 'cart'])->name('cart');;

});
//Routes for Admin ............


//Routes for  Manager ............

//Routes for  testing ............
Route::get('testing', function () {
    // $food_ids = Food::pluck('id'); 
    // foreach($food_ids as $id){
    //     $r_id = DB::table('food_restaurant')->where('food_id','=',$id)->pluck('restaurant_id')->first();
    //     Food::where('id','=',$id)->update([
    //         'restaurant_id' =>  $r_id,
    //     ]);
    // }
    // dd('ok');
    dd(\App\Models\Cart::authUserFoodPrice());
});