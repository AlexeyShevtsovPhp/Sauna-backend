<?php

namespace App\Http\Resources;

use App\Models\Book;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Book
 */

class BookingResourceByDate extends JsonResource
{
    public function toArray($request): array
    {
        JsonResource::withoutWrapping();
        return [
            'id' => $this->resource->id,
            'sauna_id' => $this->resource->sauna_id,
            'user_id' => $this->resource->user_id,
            'start_time' => $this->resource->start_time,
            'end_time' => $this->resource->end_time,
            'created_at' => $this->resource->created_at,
            'blocked' => $this->resource->blocked,
        ];
    }
}
