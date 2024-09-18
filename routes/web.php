<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;

// Home page route
Route::get('/', function () {
    return view('welcome');
});

// Resource routes for products
Route::resource('/products', ProductController::class);

// Resource routes for suppliers
Route::resource('/suppliers', SupplierController::class);

Route::resource('/transaksi', TransaksiController::class);