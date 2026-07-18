<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArrangementController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/arrangements/style', function () {
    return view('arrangements.style');
})->name('arrangements.style');

Route::resource('arrangements', ArrangementController::class);