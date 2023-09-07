<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('my-cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('products', ProductController::class)->parameters([
    'products' => 'id'
]);
Route::resource('categories', CategoryController::class)->parameters([
    'categories' => 'id'
]);
Route::resource('product-categories', ProductCategoryController::class)->parameters([
    'product-categories' => 'id'
]);
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('results', [HomeController::class, 'search'])->name('results');
Route::get('categories/{id}', [HomeController::class, 'viewCategory'])->name('category.details');
Route::get('products/{id}', [HomeController::class, 'viewProduct'])->name('product.details');


require __DIR__.'/auth.php';
