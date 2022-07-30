<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Comment;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/articles', [HomeController::class, 'show_all_articles'])->name('show_all_articles');
Route::get('/articles/{slug}', [HomeController::class, 'show_article'])->name('show_article');
Route::post('/articles/{slug}', [CommentController::class, 'send'])->name('comment_send');
