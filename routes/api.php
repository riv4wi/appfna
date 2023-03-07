<?php

use App\Http\Controllers\ArticleController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'PassportAuthController@login');
    Route::post('signup', 'PassportAuthController@signUp');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'PassportAuthController@logout');
        Route::get('user', 'PassportAuthController@user');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('statistics', [ArticleController::class, 'showStatistics']);
    Route::prefix('articles')->group(function () {
        Route::post('{article_uuid}/photos', [ArticleController::class, 'addPhoto']);
        Route::delete('{article_uuid}/photos/{photo_uuid}', [ArticleController::class, 'deletePhoto']);
        Route::post('', [ArticleController::class, 'createArticle']);
        Route::delete('{article_uuid}', [ArticleController::class, 'deleteArticle']);
        Route::get('users/{user_uuid}', [ArticleController::class, 'listArticlesByUser']);
        Route::delete('{article_uuid}/comments/{comment_uuid}', [ArticleController::class, 'deleteComment']);
    });
});

Route::middleware('guest')->group(function () {
    Route::post('auth/signup', 'PassportAuthController@signUp');
    Route::post('articles/{article_uuid}/comments', [ArticleController::class, 'addComment']);
});

