<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNameAndAvatarResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        JsonResource::withoutWrapping();
        return [
            'name' => $this->resource->name,
            'avatar' => $this->resource->avatar,
            'role' => $this->resource->role
        ];
    }
}
