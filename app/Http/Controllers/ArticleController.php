<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Photo;
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

        $article = new Article();
        $article->uuid = Str::uuid();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_uuid = 'e018658c-11bb-47cb-9011-e1374eeac731';
        //$article->user_uuid = Auth::user()->uuid;// todo for when I have the authentication
        $article->save();

        return response()->json(['status' => 'success', 'message' => 'Article created successfully']);
    }

    public function deleteArticle($article_uuid): JsonResponse
    {
        $article = Article::where('uuid', $article_uuid)->first();
        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }
        $article->delete();

        return response()->json(['status' => 'success', 'message' => 'Article deleted successfully']);
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

            return response()->json(['status' => 'success', 'message' => 'Photo added successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'No photo found']);
    }

    public function deletePhoto($article_uuid, $photo_uuid): JsonResponse
    {
        $article = Article::findOrFail($article_uuid);
        $photo = Photo::where('article_uuid', $article_uuid)->where('uuid', $photo_uuid)->firstOrFail();
        Storage::delete($photo->path);
        $photo->delete();

        return response()->json(['status' => 'success', 'message' => 'Photo deleted successfully']);
    }

    public function listArticlesByUser($user_uuid): JsonResponse
    {
        $articles = Article::with('photos')
            ->where('user_uuid', $user_uuid)
            ->get()
            ->toArray();

        foreach ($articles as &$article) {
            foreach ($article['photos'] as &$photo) {
                $photo['url'] = asset('api/images/' . $photo['path']);
            }
        }

        return response()->json(['status' => 'success', 'data' => $articles]);
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
            return response()->json(['error' => 'Article not found'], 404);
        }

        $comment = new Comment();
        $comment->uuid = Str::uuid();
        $comment->data = $request->json()->get('data');
        $comment->article_uuid = $article->uuid;
        $comment->save();

        return response()->json(['status' => 'success', 'message' => 'Comment added successfully']);
    }
}
