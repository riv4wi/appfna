<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $primaryKey = 'uuid';

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_uuid', 'uuid');
    }
}
