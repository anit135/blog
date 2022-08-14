<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/comment', CommentController::class)->only([
    'store'
]);

Route::put('/articles/{id}/view', [ArticleController::class, 'view_up'])->name('view_up');
Route::put('/articles/{id}/like', [ArticleController::class, 'like_up'])->name('like_up');
