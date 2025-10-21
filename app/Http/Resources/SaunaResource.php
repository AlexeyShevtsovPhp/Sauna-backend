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
        $pictures = json_decode($this->resource->picture, true);
        $firstPicture = null;

        if (is_array($pictures) && count($pictures) > 0) {
            $firstPicture = $pictures[0];
        }

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'picture' => $firstPicture,
        ];
    }

}
