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

        // Partner Management
        Route::get('/partners', [App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('partner.index');
    });

    // Project group
    Route::prefix('projects')->name('projects.')->group(function () {
        // Technology Management
        Route::get('/technologies', [App\Http\Controllers\Admin\TechnologyController::class, 'index'])->name('technology.index');

        // Project Management
        Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');

        // Create Project
        Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');

        // Edit Project
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('edit');
    });

    // post
    Route::prefix('posts')->name('posts.')->group(function () {
        // Post Management
        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');

        // Create Post
        Route::get('/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');

        // Edit Post
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');

        // category management
        Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    });

    // Pricing Plan
    Route::prefix('pricing')->name('pricing.')->group(function () {
        // Pricing Plan Management
        Route::get('/', [App\Http\Controllers\Admin\PricingController::class, 'index'])->name('index');

        // Create Pricing Plan
        Route::get('/create', [App\Http\Controllers\Admin\PricingController::class, 'create'])->name('create');

        // Edit Pricing Plan
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PricingController::class, 'edit'])->name('edit');
    });
});
