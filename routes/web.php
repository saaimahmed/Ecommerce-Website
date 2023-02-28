<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AddToCartController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\Front\SerachProductController;



Route::get('/',[DashboardController::class,'index'])->name('home');
Route::get('/about',[DashboardController::class,'about'])->name('about');
Route::get('/product',[DashboardController::class,'product'])->name('product');

Route::get('/blog',[DashboardController::class,'blog'])->name('blog');
Route::get('/contact',[DashboardController::class,'contact'])->name('contact');
//Products details page
Route::get('/product-details/{id}',[DashboardController::class,'productDetails'])->name('product-details');

Route::post('/add-cart/{id}',[AddToCartController::class,'addCart'])->name('add-cart');

Route::get('/show_cart',[AddToCartController::class,'showCart'])->name('show_cart');
Route::post('/remove-cart/{id}',[AddToCartController::class,'removeCart'])->name('remove-cart');

Route::get('/order_show',[AddToCartController::class,'showOrder'])->name('order_show');
Route::get('/cancel-order/{id}',[AddToCartController::class,'cancelOrder'])->name('cancel-order');

//order payment work
Route::get('/cash_order',[OrderController::class,'cashOrder'])->name('cash_order');

Route::get('/stripe/{totalprice}',[OrderController::class,'stripe'])->name('stripe');
Route::post('stripe/{totalprice}',[OrderController::class,'stripePost'])->name('stripe.post');


//Search product with ajax
Route::get('/search-product',[SerachProductController::class,'searchProduct'])->name('search-product');

//Comment And Reply

Route::post('/add-comment',[CommentReplyController::class,'addComment'])->name('add-comment');
Route::post('/add-reply',[CommentReplyController::class,'addReply'])->name('add-reply');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirect'])->name('dashboard');


    //    Resource Controller Category
    Route::resource('categories',CategoryController::class);
    //    Resource Controller product
    Route::resource('products',ProductController::class);

//    order
    Route::get('/order',[OrderController::class,'orderAdmin'])->name('order');
    Route::get('/change-delivered-status/{id}',[OrderController::class,'changeDeliveredStatus'])->name('change-delivered-status');
//    print_pdf
    Route::get('/print_pdf/{id}',[OrderController::class,'printPdf'])->name('print_pdf');
//    Send Email
    Route::get('/send_email/{id}',[OrderController::class,'sendEmail'])->name('send_email');
    Route::post('/send_user_email/{id}',[OrderController::class,'sendUserEmail'])->name('send_user_email');
});


