<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_admin'])->group(function () {

    // DASHBOARD
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // ==========================================
    // 1. BRANDING (Hero & About)
    // ==========================================
    Route::prefix('branding')->name('website.')->group(function () {
        Route::get('/hero', [App\Http\Controllers\Admin\HeroBannerController::class, 'index'])->name('hero-banner.index');
        Route::get('/about', [App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
    });

    // ==========================================
    // 2. RESUME / PROFESSIONAL (Skills, Education, Experience)
    // ==========================================
    Route::prefix('resume')->group(function () {
        // Section Header for Resume
        Route::get('/header', [App\Http\Controllers\Admin\EducationExperienceController::class, 'experienceSectionIndex'])->name('website.experience-section.index');

        // Individual Management
        Route::get('/skills', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('website.skill.index');
        Route::get('/education', [App\Http\Controllers\Admin\EducationExperienceController::class, 'educationIndex'])->name('website.education.index');
        Route::get('/experience', [App\Http\Controllers\Admin\EducationExperienceController::class, 'experienceIndex'])->name('website.experience.index');
    });

    // ==========================================
    // 3. SERVICES & CLIENTS
    // ==========================================
    Route::prefix('business')->name('website.')->group(function () {
        Route::get('/service-header', [App\Http\Controllers\Admin\ServiceController::class, 'serviceSection'])->name('service-section.index');
        Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('service.index');
        Route::get('/partners', [App\Http\Controllers\Admin\PartnerController::class, 'index'])->name('partner.index');
        Route::get('/pricing', [App\Http\Controllers\Admin\PricingController::class, 'index'])->name('pricing.index'); // Fixed name for sidebar
    });

    // ==========================================
    // 4. WORK / PORTFOLIO
    // ==========================================
    Route::prefix('portfolio')->name('projects.')->group(function () {
        Route::get('/header', [App\Http\Controllers\Admin\ProjectController::class, 'portfolioHeader'])->name('portfolio-header.index');
        Route::get('/technologies', [App\Http\Controllers\Admin\TechnologyController::class, 'index'])->name('technology.index');
        Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('edit');
    });

    // ==========================================
    // 5. BLOG / CONTENT
    // ==========================================
    Route::prefix('blog')->name('posts.')->group(function () {
        Route::get('/header', [App\Http\Controllers\Admin\PostController::class, 'blogHeader'])->name('blog-header.index');
        Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
    });

    // ==========================================
    // 6. TESTIMONIALS
    // ==========================================
    Route::prefix('feedback')->name('testimonial.')->group(function () {
        Route::get('/header', [App\Http\Controllers\Admin\TestimonialController::class, 'testimonialHeader'])->name('testimonial-header.index');
        Route::get('/', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('index');
    });

    // ==========================================
    // 7. UTILITIES (Counters)
    // ==========================================
    Route::prefix('utilities')->name('website.')->group(function () {
        Route::get('/counter-header', [App\Http\Controllers\Admin\CounterController::class, 'counterSection'])->name('counter-section.index');
        Route::get('/counters', [App\Http\Controllers\Admin\CounterController::class, 'index'])->name('counter.index');
    });

    // settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
});
