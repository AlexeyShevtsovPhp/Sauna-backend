<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUploadRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UpdateAvatarController extends Controller
{
    /**
     * @param AvatarUploadRequest $request
     * @return Response
     */
    public function upload(AvatarUploadRequest $request): Response
    {
        User::updateAvatar($request->file('avatar'));
        return response()->noContent();
    }
}
