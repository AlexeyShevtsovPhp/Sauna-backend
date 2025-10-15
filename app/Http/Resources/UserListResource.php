<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $resource
 */

class UserListResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        JsonResource::withoutWrapping();

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'avatar' => $this->resource->avatar,
            'email' => $this->resource->email
        ];
    }
}
