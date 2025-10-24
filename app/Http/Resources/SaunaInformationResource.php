<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SaunaInformationResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sauna' => [
                'id' => $this->resource->id,
                'name' => $this->resource->name,
                'description' => $this->resource->describe,
                'size' => $this->resource->size,
                'lowPrice' => $this->resource->lowPrice,
                'highPrice' => $this->resource->highPrice,
                'pictures' => json_decode($this->resource->picture, true),
            ],
            'rating' => [
                'averageRating' => round((float) (Rate::where('sauna_id', $this->id)
                    ->avg('rating') ?: 0), 2),
                'userRating' => Auth::check() ? Rate::where('sauna_id', $this->id)
                    ->where('user_id', Auth::id())->value('rating') : null,
            ]
        ];
    }
}
