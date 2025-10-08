<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest as UserRegistrationRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\UserRegistrationResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Random\RandomException;

class UserRegistrationController extends Controller
{
    /**
     * @throws ValidationException
     * @throws RandomException
     * @param UserRegistrationRequest $request
     * @return JsonResponse
     */

    public function create(UserRegistrationRequest $request): JsonResponse
    {

        $validated = $request->validated();

        $avatars = File::files(public_path('images/avatars'));

        if (empty($avatars)) {
            $avatarUrl = 'http://tytsauna.loc:8080/images/avatars/default.png';
        } else {
            $randomAvatarFile = $avatars[array_rand($avatars)];
            $avatarUrl = 'http://tytsauna.loc:8080/images/avatars/' . $randomAvatarFile->getFilename();
        }

        $user = User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'role' => 'guest',
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'avatar' => $avatarUrl,
            'created_at' => now(),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'message' => 'Пользователь успешно зарегистрирован',
            'user' => new UserRegistrationResource($user),
        ], 201);
    }
}
