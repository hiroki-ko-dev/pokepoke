<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ImageController;

Route::get('/', function () {
    return view('home');
});

Route::resource('images', ImageController::class);
