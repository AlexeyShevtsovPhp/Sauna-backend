<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\SaunaCoordinatesResource;
use App\Http\Resources\SaunaInformationResource;
use App\Models\Sauna;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class GetSaunaInfoController extends Controller
{
    public function get(int $id): JsonResponse
    {
        return response()->json([new SaunaInformationResource(Sauna::find($id)),]);
    }

    public function map(int $id): JsonResponse
    {
        return response()->json(new SaunaCoordinatesResource(Sauna::find($id)));
    }
}
