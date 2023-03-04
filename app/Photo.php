<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\UuidInterface;

/**
 * @property false|mixed|string path
 */

class Photo extends Model
{
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_uuid', 'uuid');
    }
}
