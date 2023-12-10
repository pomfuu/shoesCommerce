<?php

// admin routes

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ManageProductController;
use App\Http\Controllers\Backend\ManageOrderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('order', [ManageOrderController::class, 'index'])->name('index');

Route::resource('product', ManageProductController::class);

