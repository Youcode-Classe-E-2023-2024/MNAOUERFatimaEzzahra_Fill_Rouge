<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TagController;
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

Route::get('/favorite', [ArticleDetailController::class, 'index'])->name('favorite.article');

Route::get('/createArticle', [ArticleController::class, 'create'])->name('create.article');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [ProfilController::class, 'index'])->name('profile');

Route::get('/category', [CategoryController::class, 'index'])->name('category');

Route::get('/tag', [TagController::class, 'index'])->name('Tag');

Route::get('/Article', [ArticleController::class, 'index'])->name('admin.article');

