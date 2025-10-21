<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSaunaPhotoRequest;
use App\Http\Requests\UpdateSaunaRequest;
use App\Http\Requests\UploadSaunaPhotoRequest;
use App\Http\Resources\SaunaPhotoResource;
use App\Models\Sauna;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Repositories\Sauna\SaunaRepository;

class UpdateSaunaDataController extends Controller
{
    public function __construct(public SaunaRepository $saunaRepository)
    {
    }
    public function update(UpdateSaunaRequest $updateSaunaRequest ): Response|JsonResponse
    {
        $this->saunaRepository->update($updateSaunaRequest->validated());
        return response()->noContent();
    }

    public function addPhoto(UploadSaunaPhotoRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json(new SaunaPhotoResource((object)
        ['photo_url' => Sauna::updateSaunaPhoto($validated['sauna_id'], $validated['photo']),]));
    }

    public function deletePhoto(DeleteSaunaPhotoRequest $deleteSaunaPhotoRequest): Response
    {
        $validated = $deleteSaunaPhotoRequest->validated();
        Sauna::deleteSaunaPhoto($validated['saunaId'], $validated['photoUrl']);
        return response()->noContent();
    }
}
