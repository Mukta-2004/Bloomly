<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArrangementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::patch('/bookings/{arrangement}/approve', [AdminController::class, 'approve'])->name('bookings.approve');
    Route::patch('/bookings/{arrangement}/cancel', [AdminController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/bookings/{arrangement}/edit', [AdminController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{arrangement}', [AdminController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{arrangement}', [AdminController::class, 'destroy'])->name('bookings.destroy');
});
require __DIR__.'/auth.php';