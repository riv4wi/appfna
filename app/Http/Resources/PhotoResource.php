<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'path' => $this->path,
            'originalName' => $this->original_name,
            'articleUuid' => $this->article_uuid,
        ];
    }
}
