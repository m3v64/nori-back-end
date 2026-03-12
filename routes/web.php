<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/restaurants', function () {
    return view('restaurants.index');
})->name('restaurants.index');

Route::get('/restaurants/{id}', function ($id) {
    return view('restaurants.show');
})->name('restaurants.show');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/order-confirmation', function () {
    return view('order-confirmation');
})->name('order.confirmation');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
