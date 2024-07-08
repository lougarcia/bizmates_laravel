<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Search;
use App\Http\Controllers\CitiesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/health-check', function () {
    return '...seems to be working';
});

Route::prefix('v1')->group(function () {
    Route::get('/forecasts', [Search::class, 'forecasts']);
    Route::get('/places', [Search::class, 'places']);
    Route::get('/cities', [CitiesController::class, 'index']);
});
