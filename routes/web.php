<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArrangementController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/arrangements/style', function () {
    return view('arrangements.style');
})->name('arrangements.style');

Route::get('/arrangements/about', function () {
    return view('arrangements.about');
})->name('arrangements.about');

Route::resource('arrangements', ArrangementController::class);