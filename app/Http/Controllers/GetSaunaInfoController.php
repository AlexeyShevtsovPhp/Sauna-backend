<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\SaunaInformationResource;
use App\Models\Sauna;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class GetSaunaInfoController extends Controller
{
    public function get(int $id): JsonResponse
    {
        return response()->json([
            'data' => new SaunaInformationResource(Sauna::find($id)),
        ]);
    }
}
