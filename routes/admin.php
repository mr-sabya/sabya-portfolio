<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'is_admin')->group(function () {
    // dashboard route
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});
