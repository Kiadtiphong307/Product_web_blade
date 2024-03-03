<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;



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
    

    //แสดงรายการสินค้า
    Route::get('/show', [ProductController::class, 'show'])->name('show');

    //รถเข็น
    Route::get('/cart',[ProductController::class,'cart'])->name('cart');
    Route::get('/add/{id}', [ProductController::class,'addcart'])->name('addcart');
    Route::delete('/deletecart/{id}',[ProductController::class,'deletecart'])->name('deletecart');
    Route::put('updatecart', [ProductController::class, 'updatecart'])->name('updatecart');


    //จ่ายเงิน และ ประวัติการสั่งซื้อ database
    Route::get('/user_orders', [UserController::class, 'userOrders'])->name('user_orders');
    Route::post('/insertorder',[OrderController::class,'create'])->name('insertorder');




    

    //ระบบ Admin
    Route::prefix('Admin')->middleware('admin')->group(function () {
        //แสดงรายการสินค้าทั้งหมด
        Route::get('/product',[ProductController::class,'index'])->name('product');
        
        //จัดการผู้ใช้
        Route::get('/user',[UserController::class,'user'])->name('user');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('deleteUser');

    
        //แสดงฟอร์มสำหรับเพิ่มสินค้า และเพิ่มสินค้า
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
    
        //ลบสินค้า
        Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('delete');
        
        //แสดงฟอร์มสำหรับแก้ไขสินค้า และแก้ไขสินค้า
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

        Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
        
        //แสดงรายการสั่งซื้อทั้งหมด
        Route::get('/order',[OrderController::class,'index'])->name('order');
    });
    

});
