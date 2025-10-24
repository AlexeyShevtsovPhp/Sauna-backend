<?php

namespace App\Repositories\Rate;

interface RateRepository
{
    public function updateOrCreateSaunaRating(array $data): void;

    public function saveAverageRating(int $saunaId): void;
}
