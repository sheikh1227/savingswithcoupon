<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Auth::routes();




Route::post('insert',[AdminController::class,'insert']);
Route::get('/show',[AdminController::class,'show']);
Route::get('add-new-coupon',[AdminController::class,'addNewCoupon']);

Route::get('update/{id}',[AdminController::class,'update']);
Route::put('update/co/{para}',[AdminController::class,'updatedata']);
Route::delete('delete/{para}',[AdminController::class,'deletedata']);

Route::get('home',[HomeController::class,'index']);
Route::get('contact',[HomeController::class,'contact']);
Route::get('/',[HomeController::class,'home']);






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
