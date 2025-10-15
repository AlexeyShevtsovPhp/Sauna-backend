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

        $pictures = json_decode($this->picture, true); // декодируем JSON в массив
        $firstPicture = null;

        if (is_array($pictures) && count($pictures) > 0) {
            $firstPicture = $pictures[0];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'picture' => $firstPicture,  // только первая фотка
        ];
    }

}
