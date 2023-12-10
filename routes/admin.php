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
Route::post('order/packed/{id}', [ManageOrderController::class, 'packed'])->name('packed');
Route::post('order/shipped/{id}', [ManageOrderController::class, 'shipped'])->name('shipped');
Route::post('order/cancelled/{id}', [ManageOrderController::class, 'cancel'])->name('cancelled');

Route::resource('product', ManageProductController::class);

