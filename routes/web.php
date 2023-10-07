<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [loginController::class, 'index'])->name('login');

Route::get('about', function(){
    return view('about.index');
})->name('about');

Route::fallback(function(){
    return "Route not Exist!";
});

Route::post('/login', [loginController::class, 'handleLogin'])->name('login.submit');

// GET - request resource
// POST - create new resource
// PUT - update a resource
// PATCH - modify a resource
// DELETE - delete a resource

// CSRF TOKEN - add token dari form kita

