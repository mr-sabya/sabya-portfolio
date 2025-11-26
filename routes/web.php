<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// about page
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

// service page
Route::get('/services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service');

// project page
Route::get('/projects', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project');

// blog page
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'blog'])->name('blog');

// contact page
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');


// login
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');