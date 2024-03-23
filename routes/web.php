<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('shop.home');

Route::get('/contact', function () {
    return view('contact');
})->name('shop.contact');

Route::get('/cart', function () {
    return view('cart');
})->name('shop.cart');

Route::get('/category', function () {
    return view('category');
})->name('shop.category');

Route::get('/confirmation', function () {
    return view('confirmation');
})->name('shop.confirmation');

Route::get('/elements', function () {
    return view('elements');
})->name('shop.elements');

Route::get('/login', function () {
    return view('login');
})->name('shop.login');

Route::get('/tracking', function () {
    return view('tracking');
})->name('shop.tracking');

Route::get('/checkout', function () {
    return view('checkout');
})->name('shop.checkout');


Route::prefix('admin')->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});