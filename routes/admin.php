<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'is_admin')->group(function () {
    // dashboard route
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Hero Banner Management

    Route::name('website.')->group(function () {
        Route::get('/hero-banner', [App\Http\Controllers\Admin\HeroBannerController::class, 'index'])->name('hero-banner.index');

        // service-section page
        Route::get('/service-section', [App\Http\Controllers\Admin\ServiceController::class, 'serviceSection'])->name('service-section.index');

        // Services Management
        Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('service.index');

        // Skill Management
        Route::get('/skills', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('skill.index');

        // Education Management
        Route::get('/education', [App\Http\Controllers\Admin\EducationExperienceController::class, 'educationIndex'])->name('education.index');

        // Experience Management
        Route::get('/experience', [App\Http\Controllers\Admin\EducationExperienceController::class, 'experienceIndex'])->name('experience.index');

        // Experience Section Management
        Route::get('/experience-section', [App\Http\Controllers\Admin\EducationExperienceController::class, 'experienceSectionIndex'])->name('experience-section.index');
    });
});
