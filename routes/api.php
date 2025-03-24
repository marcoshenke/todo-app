<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;



Route::controller(UserController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/tasks/reorder', [TaskController::class, 'reorder']);
    Route::resource('tasks', TaskController::class);

    Route::controller(UserController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::get('authenticated-user', 'authenticatedUser');
        Route::get('validate-token', 'validateToken');
    });
});

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working!',
        'SANCTUM_STATEFUL_DOMAINS' => env('SANCTUM_STATEFUL_DOMAINS')
    ], 200);
});
