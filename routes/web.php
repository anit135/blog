<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/articles', [ArticleController::class, 'show_all_articles'])->name('show_all_articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show_article'])->name('show_article');
Route::put('/articles/{id}/view', [ArticleController::class, 'view_up'])->name('view_up');
Route::put('/articles/{id}/like', [ArticleController::class, 'like_up'])->name('like_up');
Route::get('/articles/tag/{tag_slug}', [ArticleController::class, 'get_articles_by_tag'])->name('get_articles_by_tag');

Route::post('/articles/{slug}', [CommentController::class, 'send'])->name('comment_send');
