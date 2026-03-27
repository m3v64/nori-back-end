<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredRestaurants = Restaurant::query()
        ->orderByDesc('rating')
        ->limit(6)
        ->get();

    $popularDishes = Dish::query()
        ->with('restaurant')
        ->inRandomOrder()
        ->limit(6)
        ->get();

    return view('index', [
        'featuredRestaurants' => $featuredRestaurants,
        'popularDishes' => $popularDishes,
    ]);
})->name('home');

Route::get('/restaurants', function () {
    $restaurants = Restaurant::query()
        ->withCount('reviews')
        ->orderByDesc('rating')
        ->get();

    return view('restaurants.index', [
        'restaurants' => $restaurants,
    ]);
})->name('restaurants.index');

Route::get('/restaurants/{restaurant}', function (Restaurant $restaurant) {
    $restaurant->load(['dishes', 'reviews.user']);

    return view('restaurants.show', [
        'restaurant' => $restaurant,
    ]);
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('menu', MenuController::class);
Route::middleware('auth')->group(function () {
    Route::get('/menu/create', [MenuController::class, 'create']);
});

require __DIR__.'/auth.php';
