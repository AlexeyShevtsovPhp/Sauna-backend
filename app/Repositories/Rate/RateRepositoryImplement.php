<?php

declare(strict_types=1);

namespace App\Repositories\Rate;

use App\Models\Rate;
use App\Models\Sauna;

class RateRepositoryImplement implements RateRepository
{
    public function __construct(public Rate $model)
    {
    }
    public function updateOrCreateSaunaRating(array $data): void
    {
        $this->model->updateOrCreate(
            [
                'sauna_id' => $data['sauna_id'],
                'user_id' => $data['user_id'],
            ],
            [
                'rating' => $data['rating'],
            ]
        );
        $this->SaveAverageRating($data['sauna_id']);
    }

    public function saveAverageRating(int $saunaId): void
    {
        $ratings = Rate::where('sauna_id', $saunaId)->get();

        if ($ratings->count() > 0) {
            $averageRating = $ratings->avg('rating');
        } else {
            $averageRating = 0;
        }
        Sauna::where('id', $saunaId)->update(['rating' => $averageRating]);
    }
}
