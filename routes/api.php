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
