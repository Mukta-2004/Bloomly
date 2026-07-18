<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArrangementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/arrangements/style', function () {
    return view('arrangements.style');
})->name('arrangements.style');

Route::get('/about', function () {
    return view('arrangements.about');
})->name('arrangements.about');

Route::get('/contact', function () {
    return view('arrangements.contact');
})->name('arrangements.contact');

Route::resource('arrangements', ArrangementController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';