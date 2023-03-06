<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('articles')->group(function () {
    Route::post('{article_uuid}/photos', [ArticleController::class, 'addPhoto']);
    Route::delete('{article_uuid}/photos/{photo_uuid}', [ArticleController::class, 'deletePhoto']);
    Route::post('', [ArticleController::class, 'createArticle']);
    Route::delete('{article_uuid}', [ArticleController::class, 'deleteArticle']);
    Route::get('users/{user_uuid}', [ArticleController::class, 'listArticlesByUser']);
    Route::post('{article_uuid}/comments', [ArticleController::class, 'addComment']);
    Route::delete('{article_uuid}/comments/{comment_uuid}', [ArticleController::class, 'deleteComment']);
});

Route::get('statistics', [ArticleController::class, 'showStatistics']);
