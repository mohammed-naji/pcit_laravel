<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/teachers', [TeacherController::class, 'teachers'])->name('teachers');
    Route::get('/students', [TeacherController::class, 'students'])->name('students');
    Route::get('/statistics', [TeacherController::class, 'statistics'])->name('statistics');
});
