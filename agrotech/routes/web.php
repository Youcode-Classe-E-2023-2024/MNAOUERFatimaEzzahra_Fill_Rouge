<?php

use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.create');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.store');
Route::get('/forgot-password/{token}', [ForgotPasswordController::class, 'edit'])->name('password.reset');
Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'update'])->name('password.update');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/articleDetail', [ArticleDetailController::class, 'create'])->name('Detail.article');

