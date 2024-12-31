<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ImageController;
use App\Http\Controllers\Web\PackController;

Route::get('/', function () {
    return view('home');
});

Route::resource('images', ImageController::class);
Route::resource('packs', PackController::class);