<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateSaunaRequest;
use App\Repositories\Rate\RateRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SaunaRateController extends Controller
{
    public function __construct(public RateRepository $rateRepository)
    {

    }

    public function rate(RateSaunaRequest $rateSaunaRequest): Response
    {
        $user = Auth::user();
        $data = $rateSaunaRequest->validated();
        $data['user_id'] = $user->id;

        $this->rateRepository->updateOrCreateSaunaRating($data);

        return response()->noContent();
    }
}
