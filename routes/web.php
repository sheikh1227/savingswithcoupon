<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Models\ProductCoupon;
use App\Notifications\CouponNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
//     return view('welcome');
// });
Auth::routes(['verify'=>true]);




Route::post('insert',[AdminController::class,'insert']);
Route::get('/show',[AdminController::class,'show']);
Route::get('add-new-coupon',[AdminController::class,'addNewCoupon']);

Route::get('update/{id}',[AdminController::class,'update']);
Route::put('update/co/{para}',[AdminController::class,'updatedata']);
Route::delete('delete/{para}',[AdminController::class,'deletedata']);


Route::get('home',[HomeController::class,'index'])->middleware('verified');
Route::get('contact',[HomeController::class,'contact'])->middleware('verified');
Route::get('/',[HomeController::class,'home'])->name('home');




Route::post('paypal', [PaypalController::class,'postPaymentWithpaypal'])->name('paypal')->middleware('verified');
Route::get('paypal',[PaypalController::class,'getPaymentStatus'])->name('status')->middleware('verified');

Route::get('test',function(){
    $coupons = ProductCoupon::with('product')
    ->where('product_id',124)
    ->take(3)
    ->get();


    
   

   $notificationSend = Notification::route('mail', Auth::user()->email)
    ->notify((new CouponNotification($coupons)));
    ProductCoupon::whereIn('id',$coupons->pluck('id')->toArray())
    ->delete();
    return redirect()->route('home');





});

// Route::get('/', function()
//  {
//     if ( Auth::check()->is_admin == 1 ) // use Auth::check instead of Auth::user
//     {
//         Route::get('show',[AdminController::class,'show']);
//     }
//      else{
//         Route::get('home',[HomeController::class,'index']);
//     }
//     Route::get('home',[HomeController::class,'index']);
//  });
// Route::group(['prefix' => '/'], function()
// {
//     if ( Auth::check()->is_admin == 1 ) // use Auth::check instead of Auth::user
//     {
//         Route::get('show',[AdminController::class,'show']);
//     } else{
//         Route::get('home',[HomeController::class,'index']);
//     }
// });

