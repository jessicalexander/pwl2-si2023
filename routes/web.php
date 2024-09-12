<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

// Home page route
Route::get('/', function () {
    return view('welcome');
});

// Resource routes for products
Route::resource('/products', ProductController::class);

// Resource routes for suppliers
Route::resource('/supplier', SupplierController::class);