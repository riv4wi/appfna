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

// To add an image to an article
Route::post('articles/{article_uuid}/photos', [ArticleController::class, 'addPhoto']);

// To remove a photo from an article
Route::delete('articles/{article_uuid}/photos/{photo_uuid}', [ArticleController::class, 'deletePhoto']);

// To create an article
Route::post('/articles', [ArticleController::class, 'createArticle']);

// To delete an article of user
Route::delete('articles/{article_uuid}', [ArticleController::class, 'deleteArticle']);

// To list all articles with their images
Route::get('users/{user_uuid}/articles', [ArticleController::class, 'listArticlesByUser']);

// To add comment to an article
Route::post('articles/{article_uuid}/comments', [ArticleController::class, 'addComment']);

// To delete comment to an article
Route::delete('articles/{article_uuid}/comments/{comment_uuid}', [ArticleController::class, 'deleteComment']);

// To show the statistics of all users
Route::get('statistics', [ArticleController::class, 'showStatistics']);

