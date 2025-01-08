<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CardController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// カード関連のAPI
Route::prefix('cards')->group(function () {
    Route::post('/', [CardController::class, 'store']); // 新規カード作成
});
