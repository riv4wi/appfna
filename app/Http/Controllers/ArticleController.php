<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
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
}
