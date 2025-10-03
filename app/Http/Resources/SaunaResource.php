<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaunaResource extends JsonResource
{
    /**
     * Преобразует модель в массив для JSON-ответа.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {

        JsonResource::withoutWrapping();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'picture' => $this->picture
        ];
    }
}
