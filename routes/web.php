<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LunchBoxController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/menu', [LunchBoxController::class, 'index'])->name('menu');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Lunch Box Management
    Route::get('/lunch-boxes', [LunchBoxController::class, 'index']);
    Route::get('/lunchboxes/create', [LunchBoxController::class, 'create'])->name('admin.lunchboxes.create');
    Route::post('/lunchboxes', [LunchBoxController::class, 'store'])->name('admin.lunchboxes.store');
    Route::get('/lunchboxes/{lunchBox}/edit', [LunchBoxController::class, 'edit'])->name('admin.lunchboxes.edit');
    Route::put('/lunchboxes/{lunchBox}', [LunchBoxController::class, 'update'])->name('admin.lunchboxes.update');
    Route::delete('/lunchboxes/{lunchBox}', [LunchBoxController::class, 'destroy'])->name('admin.lunchboxes.destroy');

    // Testimonial Management
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials');
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
});