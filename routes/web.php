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
Route::get('restaurant', [App\Http\Controllers\GeneralController::class, 'searchByRestaurant'])->name('searchBy.restaurant');

Route::middleware(['auth'])->group(function () {
    Route::get('add_to_cart/{food}', [App\Http\Controllers\GeneralController::class, 'addToCart'])->name('add.to.cart');
    Route::get('cart', [App\Http\Controllers\GeneralController::class, 'cart'])->name('cart');
    Route::get('checkout', [App\Http\Controllers\GeneralController::class, 'cartCheckout'])->name('cart.checkout');
    Route::post('order', [App\Http\Controllers\GeneralController::class, 'order'])->name('cart.order');

});
//Routes for backend ............
Route::middleware(['auth','routeForAM'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'backendIndex'])->name('backend.index');
    Route::resources([
        'roles'             => App\Http\Controllers\RoleController::class,
        'permissions'       => App\Http\Controllers\PermissionController::class,
        'users'             => App\Http\Controllers\UserController::class,
        'profiles'          => App\Http\Controllers\ProfileController::class,
        'categories'        => App\Http\Controllers\CategoryController::class,
        'restaurants'       => App\Http\Controllers\RestaurantController::class,
        'food'              => App\Http\Controllers\FoodController::class,
        'orders'            => App\Http\Controllers\OrderController::class,
        'payments'          => App\Http\Controllers\PaymentController::class,
    ]);
});

//Routes for  testing ............
Route::get('testing', function () {
});

//for log
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('error.log');