<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\fron_endController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [fron_endController::class, 'index']);
Route::get('/about', [fron_endController::class, 'about']);
Route::get('/contact', [fron_endController::class, 'contact']);
Route::post('contact/post', [fron_endController::class, 'contact_post']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo/change', [ProfileController::class, 'profile_photo_change'])->name('profile.photo.change');
});

Route::resource('category',CategoryController::class);
require __DIR__.'/auth.php';
