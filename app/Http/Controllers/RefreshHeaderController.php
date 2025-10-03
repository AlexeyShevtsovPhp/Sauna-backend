<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\UserNameAndAvatarUpdated;
use App\Http\Requests\RefreshHeaderRequest;
use Illuminate\Support\Facades\Auth;

class RefreshHeaderController extends Controller
{
    /**
     * Обновление аватара пользователя.
     *
     * @param RefreshHeaderRequest $request
     * @return RefreshHeaderRequest
     */
    public function refresh(RefreshHeaderRequest $request): RefreshHeaderRequest
    {
        $validated = $request->validated();

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->storeAs('avatars', $user->id . '.' . $avatar->getClientOriginalExtension(), 'public');

            $user->avatar = $avatarPath;
            $user->save();

            event(new UserNameAndAvatarUpdated($user->id, $user->name, asset('storage/' . $avatarPath)));
        }

        return new RefreshHeaderRequest($user);
    }
}
