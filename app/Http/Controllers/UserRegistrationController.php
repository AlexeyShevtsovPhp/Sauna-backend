<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest as UserRegistrationRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserRegistrationResource;
use Illuminate\Http\JsonResponse;

class UserRegistrationController extends Controller
{
    /**
     * @param UserRepository $userRepository
     */

    public function __construct(public UserRepository $userRepository)
    {
    }

    public function create(UserRegistrationRequest $userRegistrationRequest): JsonResponse
    {
        $user = $this->userRepository->createUser($userRegistrationRequest->validated());
        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => new UserRegistrationResource($user),
        ]);
    }
}
