<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        JsonResource::withoutWrapping();
        return [
            'comment' => $this->comment,
            'user' => [
                'name' => $this->user->name,
                'avatar' => $this->user
                    ->avatar ? url($this->user->avatar) : null,
            ]
        ];
    }
}
