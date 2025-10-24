<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaunaResource;
use App\Models\Sauna;
use App\Repositories\Sauna\SaunaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SortDataController extends Controller
{
    public function __construct(public SaunaRepository $saunaRepository)
    {
    }

    public function sort(Request $request): AnonymousResourceCollection
    {
        return SaunaResource::collection($this->saunaRepository->sortBy($request->query('sortBy', 'name')));
    }
}
