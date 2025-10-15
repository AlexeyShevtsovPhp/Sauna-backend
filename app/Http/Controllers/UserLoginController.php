<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserAuthorizationRequest;
use App\Http\Resources\UserUpdateResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function login(UserAuthorizationRequest $request): JsonResponse
    {
        $user = User::where('name', $request->name)->first();

        if (!Auth::attempt($request->validated())) {
            return response()->json(null, 401);
        }

        if ($user->blocked) {
            return response()->json(null, 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => new UserUpdateResource($user),
        ]);
    }
}
