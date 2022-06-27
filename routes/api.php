<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Http\Controllers\ProductController;


Route::resource('/products', ProductController::class);

Route::get('/products/search/{name}', [ProductController::class, 'search']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
