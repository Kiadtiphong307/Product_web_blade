<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('home');
     })->name('home');
    
    Route::get('/show',[ProductController::class,'show'])->name('show');


    //รถเข็น
    
    Route::get('/add/{id}', [ProductController::class,'addcart'])->name('addcart');

    Route::get('/cart',[ProductController::class,'cart'])->name('cart');

    Route::delete('/deletecart/{id}',[ProductController::class,'deletecart'])->name('deletecart');

    Route::put('updatecart', [ProductController::class, 'updatecart'])->name('updatecart');


    //ประวัติการสั่งซื้อ
    Route::get('/order',[OrderController::class,'index'])->name('order');


    


    Route::prefix('Admin')->group(function () {

    //แสดงรายการสินค้าทั้งหมด
    Route::get('/product',[ProductController::class,'index'])->name('product');

    //แสดงฟอร์มสำหรับเพิ่มสินค้า และเพิ่มสินค้า
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/store',[ProductController::class,'store'])->name('store');

    //ลบสินค้า
    Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('delete');
    
    //แสดงฟอร์มสำหรับแก้ไขสินค้า และแก้ไขสินค้า
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('update');

    });

});
