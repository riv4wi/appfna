<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $primaryKey = 'uuid';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_uuid', 'uuid');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'article_uuid', 'uuid');
    }
}
