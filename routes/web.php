<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
 
// Home page - show all products
Route::get('/', [ProductController::class, 'index'])->name('home');
 
// Product CRUD routes
Route::resource('products', ProductController::class);
 
// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
 