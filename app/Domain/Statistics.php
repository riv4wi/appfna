<?php

namespace App\Domain;

use App\Article;
use App\User;
use Illuminate\Support\Facades\DB;

class Statistics
{
    public function __construct($user_uuid)
    {
        $this->user_uuid = $user_uuid;
    }

    public function getArticlesWithPhotos()
    {
        return Article::where('user_uuid', $this->user_uuid)
            ->whereHas('photos')
            ->count();
    }

    public function getArticlesWithoutPhotos()
    {
        return Article::where('user_uuid', $this->user_uuid)
            ->doesntHave('photos')
            ->count();
    }

    public function getCommentsByArticles()
    {
        return Article::leftJoin('comments', 'articles.uuid', '=', 'comments.article_uuid')
            ->select('articles.title', DB::raw('COUNT(comments.uuid) as TotalComments'))
            ->where('articles.user_uuid', $this->user_uuid)
            ->groupBy('articles.uuid', 'articles.title')
            ->get()
            ->toArray();
    }

}
