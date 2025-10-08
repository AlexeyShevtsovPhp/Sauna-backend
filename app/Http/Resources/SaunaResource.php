<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaunaResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        JsonResource::withoutWrapping();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'picture' => $this->picture
        ];
    }
}
