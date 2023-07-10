<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/product/{id}', [HomeController::class, 'viewProduct'])->name('viewProduct');

#Cart Routes
Route::get('/home/cart', [CartController::class, 'index'])->name('home.cart')->middleware('auth');
Route::post('/home/cart/{productId}', [CartController::class, 'store'])->name('home.cart.store')->middleware('auth');
Route::post('/home/delete/{cartId}', [CartController::class, 'destroy'])->name('home.cart.destroy')->middleware('auth');
Route::post('home/buy', [CartController::class, 'buy'])->name('home.buy')->middleware('auth');
Route::post('home/{id}/cart', [HomeController::class, 'updateCart'])->name('updateCart')->middleware('auth');

#User Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/search', [HomeController::class, 'search'])->name('search');
Route::get('/home/user', [HomeController::class, 'user'])->name('user')->middleware('auth');
Route::get('/home/history', [HomeController::class, 'history'])->name('home.history')->middleware('auth');
Route::get('/home/{categoryId}', [HomeController::class, 'products'])->name('home.products');
Route::post('home/purchase/{productId}', [HomeController::class, 'purchase'])->name('home.purchase')->middleware('auth');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



#Admin Routes
Route::prefix('admin')->middleware(['auth', 'verifAdmin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    #categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories/store', [AdminController::class, 'categoriesStore'])->name('categories.store');
    Route::post('/categories/update/{categoryId}', [AdminController::class, 'categoriesUpdate'])->name('categories.update');
    Route::post('/categories/delete/{categoryId}', [AdminController::class, 'categoriesDelete'])->name('categories.delete');
    #products
    Route::get('/products', [AdminController::class, 'productsIndex'])->name('products');
    Route::post('/products/store', [AdminController::class, 'productsStore'])->name('products.store');
    Route::post('/products/delete/{productId}', [AdminController::class, 'productsDelete'])->name('products.delete');
    Route::post('/products/update/{productId}', [AdminController::class, 'productsUpdate'])->name('products.update');
    #Sales
    Route::get('/sales', [AdminController::class, 'sales'])->name('admin.sales');
});
