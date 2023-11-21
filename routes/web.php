<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\fron_endController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddminContorller;
use App\Http\Controllers\ProductController;
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
Route::get('product/details/{id}', [fron_endController::class, 'product_details'])->name('product.details');
Route::get('/about', [fron_endController::class, 'about']);
Route::get('/contact', [fron_endController::class, 'contact']);
Route::post('contact/post', [fron_endController::class, 'contact_post']);
Route::get('dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('vendor/approve/{id}', [HomeController::class, 'vendor_approve'])->middleware(['auth'])->name('vendor.approve');


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo/change', [ProfileController::class, 'profile_photo_change'])->name('profile.photo.change');
    Route::resource('category',CategoryController::class)->middleware('admin.checker');
   Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore')->middleware('admin.checker');
   Route::get('category/parmanent/{id}', [CategoryController::class, 'parmanent_delete'])->name('category.parmanent.delete')->middleware('admin.checker');
   Route::resource('product',ProductController::class)->middleware('vendor.checker');
});


Route::get('vendor/register', [vendorController::class, 'register'])->name('vendor.register');
Route::post('vendor/register/post', [vendorController::class, 'register_post'])->name('vendor.register.post');
Route::middleware(['auth','admin.checker'])->group(function () {
Route::get('add/new/admin', [AddminContorller::class, 'add_new_admin'])->name('add.new.admin');
Route::post('add/new/admin/post', [AddminContorller::class, 'add_new_admin_post'])->name('add.new.admin.post');
Route::get('deactive/admin/{id}', [AddminContorller::class, 'deactive_admin'])->name('deactive.admin');
Route::get('active/admin/{id}', [AddminContorller::class, 'active_admin'])->name('active.admin');
});
require __DIR__.'/auth.php';
