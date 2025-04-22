<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionController;

Route::middleware('api')->group(function () {
    Route::apiResource('transacciones', TransaccionController::class);
});