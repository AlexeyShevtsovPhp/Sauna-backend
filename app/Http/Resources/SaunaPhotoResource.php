<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaunaPhotoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'url' => $this->photo_url,
        ];
    }
}
