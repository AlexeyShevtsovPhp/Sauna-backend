<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Http\Resources\SaunaResource;
use App\Models\Sauna;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;


#[AllowDynamicProperties]
class SaunaListController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */

    public function get(): AnonymousResourceCollection
    {
        $categories = Sauna::query()->get();

        return SaunaResource::collection($categories);
    }
}
