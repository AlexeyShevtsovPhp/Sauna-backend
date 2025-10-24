<?php

declare(strict_types=1);

namespace App\Repositories\Sauna;

interface SaunaRepository
{
    public function update(array $data): bool;

    public function sortBy($sortBy = 'name');
}
