<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;
use App\Http\Resources\UserUpdateResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserUpdateController extends Controller
{

    public function __construct(public UserRepository $userRepository)
    {
    }

    public function update(UpdateUserRequest $updateUserRequest): UserUpdateResource|Response
    {
        /** @var User $user */
        $user = Auth::user();
        $this->userRepository->updateUser($user, $updateUserRequest->validated());
        return new UserUpdateResource($user);
    }
}
