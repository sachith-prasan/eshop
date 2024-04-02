<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Forgotpassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/forgot', [Forgotpassword::class, 'forgot']);	
Route::post('/auth/otp', [Forgotpassword::class, 'otpVerify']);
Route::post('/auth/change-password', [Forgotpassword::class, 'changePassword']);
Route::post('/add-product', [ProductController::class, 'addProduct']);
Route::post('/update-product', [ProductController::class, 'updateProduct']);
Route::post('/delete-product', [ProductController::class, 'deleteProduct']);
Route::post('/add-category', [ProductController::class, 'addCategory']);

