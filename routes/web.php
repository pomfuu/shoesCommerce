<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WomenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' =>['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'] )->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::delete('cart/{cart}', [CartController::class, 'destroy'])->name('destroy');
    Route::post('cart/checkout', [CartController::class, 'cartToCheckout'])->name('cart.checkout');
    Route::post('{id}/add-to-cart', [ProductController::class, 'addToCart'])->name('detail.addToCart');
    Route::post('check-out/{id}', [ProductController::class, 'instantCheckOut'])->name('detail.instantCheckOut');
    Route::post('instant/order/{id}', [CheckoutController::class, 'instantOrder'])->name('instant.order');
    Route::post('cart/order', [CheckoutController::class, 'cartOrder'])->name('cart.order');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/product')->group(function(){
    Route::get('/brand', [BrandController::class, 'index'])->name('product.brand');
    Route::get('/women', [WomenController::class, 'index'])->name('product.women');
    Route::get('/men', [MenController::class, 'index'])->name('product.men');
    Route::get('/detail/{id}', [ProductController::class, 'productDetails'])->name('product.detail');
});

// Route::prefix('/transaction')->group(function(){

//     Route::get('/cart', [CartController::class, 'index'])->name('transaction.cart');
// });
