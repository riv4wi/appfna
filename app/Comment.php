<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'data',
        'article_uuid',
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_uuid', 'uuid');
    }
}
