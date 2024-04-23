<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\articlesController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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


/* ----Home---- */
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


/* ----Register---- */
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


/* ----Login---- */
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');


/* ----Forgot password---- */
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.create');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.store');
Route::get('/forgot-password/{token}', [ForgotPasswordController::class, 'edit'])->name('password.reset');
Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'update'])->name('password.update');


/* ----Manager Article---- */
Route::get('/articles', [ArticleController::class, 'indexUser'])->name('article');

Route::get('/Article', [ArticleController::class, 'index'])->name('admin.article');
Route::get('/createArticle', [ArticleController::class, 'create'])->name('create.article');
Route::post ('/Article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/Article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/Article/update', [ArticleController::class, 'update'])->name('article.update');
Route::post('/Article/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');



Route::get('/articleDetail', [ArticleDetailController::class, 'create'])->name('Detail.article');
Route::get('/favorite', [ArticleDetailController::class, 'index'])->name('favorite.article');


/* ----Manager User---- */
Route::get('/user', [UserController::class, 'index'])->name('user');


/* ----Manager category---- */
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');


/* ----Manager tag---- */
Route::get('/tag', [TagController::class, 'index'])->name('tag');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::post('/tag/update', [TagController::class, 'update'])->name('tag.update');
Route::post('/tag/destroy', [TagController::class, 'destroy'])->name('tag.destroy');


/* ---Subscriber---*/
Route::get('/listeSubscriber' ,[SubscriberController::class, 'ListeSub'])->name('show.subscriber');
Route::post('/unsubscribe' ,[SubscriberController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('/dashboard', [SubscriberController::class,'showSubscriberStatistics'])->name('showSubscriberStatistics');
Route::post('/home' ,[SubscriberController::class, 'addSubscriber'])->name('add_subscriber');
Route::get('/dashboard', [subscriberController::class,'showSubscriberStatistics'])->name('showSubscriberStatistics');


/* ---Dashboard---*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


/* ---Profil---*/
Route::get('/profile/show/{article}', [ProfileController::class, 'show'])->name('profile.show');

