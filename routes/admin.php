<?php

// admin routes

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ManageBrandController;
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

// Route::get('brand', [ManageBrandController::class, 'index'])->name('manageBrand');
// Route::post('brand/create', [ManageBrandController::class, 'create'])->name('addBrand');
// Route::post('brand/edit/{id}', [ManageBrandController::class, 'edit'])->name('editBrand');

Route::resource('brand', ManageBrandController::class);
Route::resource('product', ManageProductController::class);

