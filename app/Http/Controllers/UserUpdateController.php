<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Response;
use App\Http\Resources\UserUpdateResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserUpdateController extends Controller
{
    public function update(UpdateUserRequest $request): UserUpdateResource|Response
    {
        $user = Auth::user();

        $validated = $request->validated();

        $user->fill($validated);

        if (!$user->isDirty()) {
            return response()->noContent();
        }

        $user->save();

        return new UserUpdateResource($user);
    }
}
