<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserUpdateResource extends JsonResource
{
    public function toArray($request): array
    {
        JsonResource::withoutWrapping();
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'lastName' => $this->resource->lastName,
            'middleName' => $this->resource->middleName,
            'email' => $this->resource->email,
            'phone' => $this->resource->phone,
            'address' => $this->resource->address,
            'avatar' => $this->resource->avatar,
        ];
    }
}
