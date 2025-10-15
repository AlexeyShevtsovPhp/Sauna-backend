<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserNameAndAvatarResource;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class GetUserInfoController extends Controller
{
    public function nameAndAvatar(): UserNameAndAvatarResource
    {
        return new UserNameAndAvatarResource(Auth::user());
    }

    public function profileInfo(): UserProfileResource
    {
        return new UserProfileResource(Auth::user());
    }

    public function profileInfo4Admin($userId): UserProfileResource
    {
        return new UserProfileResource(User::findOrFail($userId));
    }
}

