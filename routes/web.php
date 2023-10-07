<?php

use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(['prefix' => 'customer'], function(){
//     Route::get('/', function(){
//         return "<h1> Customer List </h1>";
//     });

//     Route::get('/create', function(){
//         return "<h1> Customer create </h1>";
//     });
// });

// Route::get('about', function(){
//     $about = 'This is a about page';
//     $about2 = 'this is about two';
//     return view('about.index', compact('about', 'about2')); // ['about' => $about]
// });

Route::get('about', function(){
    return view('about.index');
})->name('about');

Route::fallback(function(){
    return "Route not Exist!";
});


require __DIR__.'/auth.php';

// GET - request resource
// POST - create new resource
// PUT - update a resource
// PATCH - modify a resource
// DELETE - delete a resource

