<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/confirm/{order}', [CheckoutController::class, 'confirm'])->name('checkout.confirm');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.detail');

Route::prefix('backend/dashboard')->name('backend.dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/create', [DashboardController::class, 'create'])->name('create');
    Route::post('/store', [DashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [DashboardController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [DashboardController::class, 'destroy'])->name('destroy');
});
