<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArrangementController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('arrangements', ArrangementController::class);