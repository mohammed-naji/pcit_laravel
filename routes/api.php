<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::prefix('v1')->group(function () {
//     Route::get('/dev', function () {
//         return [
//             'name' => 'Mohammed Naji',
//             'email' => 'moh@gmail.com',
//             'phone' => 123
//         ];
//     });
// });

// Route::prefix('v2')->group(function () {
//     Route::get('/dev', function () {
//         return [
//             'name' => 'Mohammed Naji',
//             'email' => 'moh@gmail.com',
//             'phone' => 123
//         ];
//     });
// });

// index, show, create, store, edit, updated, destroy
// index, show, store, updated, destroy

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::middleware('throttle:6,1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
