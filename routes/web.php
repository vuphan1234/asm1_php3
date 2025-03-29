<?php

use App\Helper\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\PasswordResetController;




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

Route::get('/products/{slug}', [ProductController::class, 'index']);
Route::get('/productdetail/{slug}', [ProductController::class, 'productDetail']);
Route::get('/product/search', [ProductController::class, 'search']);

Route::post('/addcart', [CartController::class, 'addCart']);
Route::post('/remove', [CartController::class, 'removeCart']);
Route::get('/cart', [CartController::class, 'index']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postlogin']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postregister']);

Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/forgot-password', 'showForgetPasswordForm');
    Route::post('/forgot-password', 'submitForgetPasswordForm');
    Route::get('/reset-password/{token}', 'showResetPasswordForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});
