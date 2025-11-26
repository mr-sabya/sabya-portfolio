<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'is_admin')->group(function () {
    // dashboard route
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Hero Banner Management

    Route::name('website.')->group(function () {
        Route::get('/hero-banner', [App\Http\Controllers\Admin\HeroBannerController::class, 'index'])->name('hero-banner.index');
    });
});
