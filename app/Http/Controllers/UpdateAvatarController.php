<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUploadRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UpdateAvatarController extends Controller
{
    /**
     * @param AvatarUploadRequest $avatarUploadRequest
     * @return Response
     */
    public function upload(AvatarUploadRequest $avatarUploadRequest): Response
    {
        User::updateAvatar($avatarUploadRequest->file('avatar'));
        return response()->noContent();
    }
}
