<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');


Route::post('/login', [UserController::class, 'login']); // Login normal
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum'); // Logout

Route::post('/register', [UserController::class, 'register']);

Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});
