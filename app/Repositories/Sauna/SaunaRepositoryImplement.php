<?php

declare(strict_types=1);

namespace App\Repositories\Sauna;

use App\Models\Sauna;

class SaunaRepositoryImplement implements SaunaRepository
{
    public function update(array $data): bool
    {
        $sauna = Sauna::findOrFail($data['id']);

        if (isset($data['description'])) {
            $sauna->describe = $data['description'];
        }

        if (isset($data['images'])) {
            $sauna->picture = json_encode($data['images']);
        }

        return $sauna->save();
    }
}
