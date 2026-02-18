<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// about page
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

// service page
Route::get('/services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service');

// project page
Route::get('/projects', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project');

// project details page
Route::get('/projects/{slug}', [App\Http\Controllers\Frontend\ProjectController::class, 'show'])->name('projects.show');

// blog page
Route::get('/blog', [App\Http\Controllers\Frontend\BlogController::class, 'blog'])->name('blog');

// blog details page
Route::get('/blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');

// contact page
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');

// pricing page
Route::get('/pricing', [App\Http\Controllers\Frontend\PricingController::class, 'index'])->name('pricing');


// login
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');