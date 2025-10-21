<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingProfileResource extends JsonResource
{
    public function toArray($request): array
    {
        JsonResource::withoutWrapping();
        return [
            'time' => [
                'start_time' => $this->resource->start_time,
                'end_time' => $this->resource->end_time,
            ],
            'sauna' => [
                'id' => $this->resource->id,
                'name' => $this->resource->sauna->name,
            ],
        ];
    }
}
