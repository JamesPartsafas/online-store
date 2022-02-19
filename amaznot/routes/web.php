<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

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

// Register User
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login User
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout User
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Home 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product List
Route::get('/products/{category}', [ListController::class, 'index'])->name('productlist');
Route::get('/products/{category}?subcategory={subcategory}', [ListController::class, 'index'])->name('productsubcatlist');

// Product Page
Route::get('/products/{category}/{id}', [ProductController::class, 'index'])->name('productpage');

// Admin Functions
Route::get('/admin/addproduct', [AdminController::class, 'index'])->name('adminpage');
Route::post('/admin/addproduct', [AdminController::class, 'store']);

// Cart Page
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Orders
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders', [OrderController::class, 'store']);