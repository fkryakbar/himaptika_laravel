<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GebyarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
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

// blog
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'getslug']);
Route::post('/blog/{slug}', [CommentController::class, 'PostComment']);
Route::get('/sosial', [SocialController::class, 'index']);
Route::get('/gebyar-matematika-2022', [GebyarController::class, 'index']);

// admin
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', [DashboardController::class, 'attempt_login']);
Route::get('/logout', [DashboardController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/blog', [DashboardController::class, 'list_blog'])->middleware('auth');
Route::get('/dashboard/blog/new', [DashboardController::class, 'add_blog'])->middleware('auth');
Route::post('/dashboard/blog/new', [DashboardController::class, 'submit_blog'])->middleware('auth');
Route::get('/dashboard/delete/blog/{id}', [DashboardController::class, 'delete_blog'])->middleware('auth');
Route::get('/dashboard/blog/edit/{id}', [DashboardController::class, 'edit_blog'])->middleware('auth');
Route::post('/dashboard/blog/edit/{id}', [DashboardController::class, 'save_blog'])->middleware('auth');
Route::get('/dashboard/komentar', [DashboardController::class, 'list_komentar'])->middleware('auth');
Route::get('/dashboard/komentar/delete/{id}', [DashboardController::class, 'delete_comment'])->middleware('auth');
Route::get('/dashboard/pengumuman', [DashboardController::class, 'list_pengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/new', [DashboardController::class, 'submit_pengumuman'])->middleware('auth');
Route::post('/dashboard/pengumuman/new', [DashboardController::class, 'add_pengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/delete/{id}', [DashboardController::class, 'delete_pengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/edit/{id}', [DashboardController::class, 'edit_pengumuman'])->middleware('auth');
Route::post('/dashboard/pengumuman/edit/{id}', [DashboardController::class, 'save_pengumuman'])->middleware('auth');
