<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function(){
    Route::apiResource('tasks',TaskController::class);
    Route::patch('/tasks/{tasks}/complete',CompleteTaskController::class);
});

Route::prefix('auth')->group(function(){
    Route::post('/register',RegisterController::class);
    Route::post('/login',LoginController::class);
    Route::post('/logout',LogoutController::class)->middleware('auth:sanctum');
});