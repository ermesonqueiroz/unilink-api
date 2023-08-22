<?php

use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
   Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('users')->group(function () {
   Route::post('/', [UserController::class, 'create']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('appearances')->group(function () {
        Route::post('/', [AppearanceController::class, 'create']);
    });

    Route::prefix('links')->group(function () {
        Route::post('/', [LinkController::class, 'create']);
        Route::patch('/{id}', [LinkController::class, 'update']);
    });
});
