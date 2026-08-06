<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers');
    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::get('/statistics', [AdminController::class, 'statistics'])->name('statistics');
});
