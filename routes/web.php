<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[RegisterController::class,'show']);
Route::post('/register', [RegisterController::class,'register'])->name('register');

Route::get('login',[LoginController::class,'show'])->name('login.show');
Route::post('/login', [LoginController::class,'login'])->name('login');

#User Routes
Route::get('/home/user',[HomeController::class,'user'])->name('user')->middleware('auth');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

#Admin Routes
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin');
    #categories
    Route::get('/categories',[AdminController::class,'categories'])->name('categories');
    Route::post('/categories/store',[AdminController::class,'categoriesStore'])->name('categories.store');
    Route::post('/categories/update/{categoryId}',[AdminController::class,'categoriesUpdate'])->name('categories.update');
    Route::post('/categories/delete/{categoryId}',[AdminController::class,'categoriesDelete'])->name('categories.delete');
    #products
    Route::get('/products',[AdminController::class,'productsIndex'])->name('products');
    Route::post('/products/store',[AdminController::class,'productsStore'])->name('products.store');
});