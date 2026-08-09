<?php

use App\Http\Controllers\Course1Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'Homepage';
// });

// home, about, team, services

// Route::get('/', function () {
//     return 'Homepage';
// });

// Route::get('post', function () {
//     return 'About Us';
// });

// Route::get('/{id}', function ($id) {
//     return "Not Found";
// });

// Route::match(['put', 'patch', 'post'], '/', function () {});


// Route::fallback(function () {
//     // return 'هادي الصفحة مش موجودة اخوي بعينك الله دور على رابط تاني';
//     return redirect('/');
// });

// Route::get('/', function () {
//     // url generation
//     // return '<a href="/about">About Us</a>';
//     // $link = url('/about');
//     // $link = url('/about');
//     $link = route('abc');
//     return "<a href='$link'>About Us</a>";
// });

// Route::get('/about-meeeeeee', function () {
//     return 'About Us Page Goes Here';
// })->name('abc');

// home, about, team, services, contact us

// Route::get('/', function () {
//     return 'home';
// })->name('home');

// Route::get('/about', function () {
//     return 'about';
// })->name('about');

// Route::get('/team', function () {
//     return 'team';
// })->name('team');

// Route::get('/services', function () {
//     return 'services';
// })->name('services');

// Route::get('/contact-us', function () {
//     return 'contact us';
// })->name('contact-us');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/home', function () {})->name('home');
//     Route::get('/posts', function () {})->name('posts');
//     Route::get('/products', function () {})->name('products');
//     Route::get('/users', function () {})->name('users');
// });

// Route::get('/', [MainController::class, 'index'])->name('home');
// Route::put('/edit', [MainController::class, 'edit'])->name('edit_post');

// include 'admin.php';

// Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
// Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
// Route::match(['put', 'patch'], '/courses/{id}', [CourseController::class, 'update'])->name('course.updated');

// Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Route::resource('courses', CourseController::class);
// Route::apiResource('courses', Course1Controller::class);

// Route::get('/export', ExportController::class);

// Route::get('/meals/{name}', [MainController::class, 'meals'])->name('main.meals');

Route::get('posts', [MainController::class, 'posts'])->name('posts');
