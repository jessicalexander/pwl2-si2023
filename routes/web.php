<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;

// Home page route
Route::get('/', function () {
    return view('transaksi.mail');
});

// Resource routes for products
Route::resource('/products', ProductController::class);

// Resource routes for suppliers
Route::resource('/suppliers', SupplierController::class);

// Resource routes for transaksi
Route::resource('/transaksi', TransaksiController::class);

//route kirim email
Route::get('/email/{to}/{id}', [TransaksiController::class, 'mail'])->name('email');