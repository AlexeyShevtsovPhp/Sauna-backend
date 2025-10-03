<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserAuthorizationRequest;
use App\Http\Resources\UserUpdateResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserLoginController extends Controller
{
    public function login(UserAuthorizationRequest $request): JsonResponse
    {

        $user = User::where('name', $request->name)->first();

        if (! $user || ! password_verify($request->password, $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => new UserUpdateResource($user),
        ]);
    }
}
