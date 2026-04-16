<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::resource('menu', MenuController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy',
])->middleware('auth');

Route::resource('menu', MenuController::class)->only([
    'index', 'show',
]);

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages');
    Route::get('/admin/messages/{message}', [ContactController::class, 'show'])->name('admin.messages.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
