<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Models
use App\Models\Product;

// Controllers
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Public Routes

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/products', [ProductController::class, 'store']);

    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

});
