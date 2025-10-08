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
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
            ],
            'sauna' => [
                'id' => $this->id,
                'name' => $this->sauna->name,
            ],
        ];
    }
}
