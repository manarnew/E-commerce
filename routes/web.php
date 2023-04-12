<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\AdminController;
use App\Http\Middleware\ifAdminMiddleware;
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

Route::get('/',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin route
route::controller(AdminController::class)->group(function(){
 route::middleware(['auth',ifAdminMiddleware::class])->group(function(){
    Route::get('/view_product','view_product');
    Route::post('/add_product','add_product');
    Route::get('/show_product','show_product');
    Route::get('/delete_product/{id}','delete_product');
    Route::get('/update_product/{id}','update_product');
    
    Route::post('/edit_product/{id}','edit_product');
    Route::get('/order','order');
    Route::get('/delivered/{id}','delivered');
    Route::get('/print_pdf/{id}','print_pdf');
    Route::get('/order_search','order_search');
    Route::get('/view_category','view_category');
    Route::post('/add_category','add_category');

    Route::get('/delete_category/{id}','delete_category');
});
});


//user route
route::controller(HomeController::class)->group(function(){
    route::middleware(['auth','verified'])->group(function(){
    Route::get('/redirect','redirect')->middleware('auth','verified');
    Route::post('/add_cart/{id}','add_cart');
    Route::get('/show_cart','show_cart');
    Route::get('/remove_cart/{id}','remove_cart');
    Route::get('/cash_order','cash_order');
    Route::get('/show_order','show_order');
    Route::get('/cancel_order/{id}','cancel_order');
    Route::post('/add_comment','add_comment');
    Route::post('/add_reply','add_reply');
});
    Route::get('/product_details/{id}','product_details');
    Route::get('/search','search');
    Route::get('/products','products');
    Route::get('/search_product','search_product');
    
});











