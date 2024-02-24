<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('home');
     })->name('home');

    //แสดงรายการสินค้าทั้งหมด
    Route::get('product',[ProductController::class,'index'])->name('product');
    
    //แสดงฟอร์มสำหรับเพิ่มสินค้า และเพิ่มสินค้า
    Route::get('create',[ProductController::class,'create'])->name('create');

    Route::post('store',[ProductController::class,'store'])->name('store');

    //ลบสินค้า
    Route::get('destroy/{product_id}',[ProductController::class,'destroy'])->name('delete');

    //แสดงฟอร์มสำหรับแก้ไขสินค้า และแก้ไขสินค้า
    Route::get('edit/{product_id}',[ProductController::class,'edit'])->name('edit');

    Route::post('update/{product_id}',[ProductController::class,'update'])->name('update');
    

});
