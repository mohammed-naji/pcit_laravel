<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/teachers', [StudentController::class, 'teachers'])->name('teachers');
    Route::get('/students', [StudentController::class, 'students'])->name('students');
    Route::get('/statistics', [StudentController::class, 'statistics'])->name('statistics');
});
