<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Domain\Statistics;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PhotoResource;
use App\Photo;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function createArticle(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $article = new Article;
        $article->uuid = Str::uuid();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        //todo for when I have the authentication Auth::user()->uuid;
        $article->user_uuid = 'e018658c-11bb-47cb-9011-e1374eeac731';
        $article->save();

        return response()->json(new ArticleResource($article), 201);
    }

    public function deleteArticle($article_uuid): JsonResponse
    {
        $article = Article::where('uuid', $article_uuid)->first();
        if (!$article) {
            return response()->json(['error' => __('article.article_not_found')], 404);
        }
        $article->delete();

        return response()->json(['status' => 'success', 'message' => __('article.article_deleted_successfully')]);
    }

    public function addPhoto(Request $request, $article_uuid): JsonResponse
    {
        $article = Article::findOrFail($article_uuid);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('api/images');

            $photo = new Photo;
            $photo->uuid = Str::uuid();
            $photo->path = $path;
            $photo->original_name = $file->getClientOriginalName();
            $photo->article_uuid = $article_uuid;
            $article->photos()->save($photo);

            return response()->json(new PhotoResource($photo), 201);
        }

        return response()->json(['status' => 'error', 'message' => __('article.no_photo_found')]);
    }

    public function deletePhoto($article_uuid, $photo_uuid): JsonResponse
    {
        $article = Article::findOrFail($article_uuid);
        $photo = Photo::where('article_uuid', $article_uuid)->where('uuid', $photo_uuid)->firstOrFail();
        Storage::delete($photo->path);
        $photo->delete();

        return response()->json(['status' => 'success', 'message' => __('article.photo_deleted_successfully')]);
    }

    public function listArticlesByUser($user_uuid): JsonResponse
    {
        $articles = Article::with('photos')->where('user_uuid', $user_uuid)->get();
        return response()->json(ArticleResource::collection($articles), 200);
    }

    public function addComment(Request $request, $article_uuid): JsonResponse
    {
        $validator = Validator::make($request->json()->all(), [
            'data' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $article = Article::where('uuid', $article_uuid)->first();

        if (!$article) {
            return response()->json(['error' =>  __('article.article_not_found')], 404);
        }

        $comment = new Comment();
        $comment->uuid = Str::uuid();
        $comment->data = $request->json()->get('data');
        $comment->article_uuid = $article->uuid;
        $comment->save();

        return response()->json(new CommentResource($comment), 201);
    }

    public function deleteComment(Request $request, $article_uuid, $comment_uuid): JsonResponse
    {
        $validator = Validator::make(['article_uuid' => $article_uuid, 'comment_uuid' => $comment_uuid], [
            'article_uuid' => 'required|uuid',
            'comment_uuid' => 'required|uuid',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => __('article.invalid_parameters')], 400);
        }

        $article = Article::where('uuid', $article_uuid)->first();

        if (!$article) {
            return response()->json(['error' => __('article.article_not_found')], 404);
        }

        $comment = Comment::where('uuid', $comment_uuid)->where('article_uuid', $article_uuid)->first();

        if (!$comment) {
            return response()->json(['error' => __('article.comment_not_found')], 404);
        }

        $comment->delete();

        return response()->json(['status' => 'success', 'message' => __('article.comment_deleted_successfully')], 200);
    }

    public function showStatistics(): JsonResponse
    {
        $statistics = [];
        $users = User::select('uuid', 'username')->pluck('username', 'uuid');

        foreach ($users as $user_uuid => $username) {
            $dataUser = [];
            $userStat = new Statistics($user_uuid);
            $dataUser['user_uuid'] = $user_uuid;
            $dataUser['username'] = $username;
            $dataUser['articles_with_photo'] = $userStat->getArticlesWithPhotos();
            $dataUser['articles_without_photo'] = $userStat->getArticlesWithoutPhotos();
            $dataUser['total_articles'] = $dataUser['articles_with_photo'] + $dataUser['articles_without_photo'];
            $dataUser['commentsByArticles'] = $userStat->getCommentsByArticles();
            $statistics[] = $dataUser;
        }

        return response()->json(['statistics' => $statistics], 200);
    }
}
