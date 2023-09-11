<?php

use App\Http\Controllers\AdminController;
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
    return redirect('home');
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






//admin routes
Route::middleware(['auth', 'auth.admin'])->group(function () {
    //C views
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('category.create');
    //R views
    Route::get('/admin/products', [AdminController::class, 'viewProducts'])->name('admin.products');
    Route::get('/admin/categories', [AdminController::class, 'viewCategories'])->name('admin.categories');
    Route::get('/admin/results', [AdminController::class, 'search'])->name('admin.results');
    //U views
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    //U controllers
    Route::post("/products-categories/many", [ProductCategoryController::class, 'storeMany']);
    Route::post("/products-categories/put", [ProductCategoryController::class, 'put']);
    // D controllers
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});



require __DIR__ . '/auth.php';
