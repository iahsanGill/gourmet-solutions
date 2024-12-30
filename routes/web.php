<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\OrderController;

// Public Routes
Route::view('/', 'home')->name('home');
Route::get('/about', [TestimonialController::class, 'about'])->name('about');
Route::get('/browse', [BrowseController::class, 'index'])->name('browse');
Route::get('/services/{user}', [BrowseController::class, 'showUserServices'])->name('services.by.user');
Route::view('/register', 'register')->name('register');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/lunchboxes', [AdminController::class, 'index'])->name('admin.lunchboxes');
    Route::post('/admin/lunchboxes', [AdminController::class, 'store'])->name('admin.lunchboxes.store');
    Route::get('/admin/lunchboxes/{id}/edit', [AdminController::class, 'edit'])->name('admin.lunchboxes.edit');
    Route::put('/admin/lunchboxes/{id}', [AdminController::class, 'update'])->name('admin.lunchboxes.update');
    Route::delete('/admin/lunchboxes/{id}', [AdminController::class, 'destroy'])->name('admin.lunchboxes.delete');
    Route::put('/admin/update-description', [AdminController::class, 'updateDescription'])->name('admin.update.description');
});

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');