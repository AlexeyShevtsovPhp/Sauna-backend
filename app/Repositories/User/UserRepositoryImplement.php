<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImplement implements UserRepository
{
    public function blockUser(int $userId): bool
    {
        $user = User::find($userId);
        return $user && ($user->blocked = true) && $user->save();
    }

    public function unblockUser(int $userId): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }
        $user->blocked = false;
        return $user->save();
    }

    public function createUser(array $data): User
    {
        $avatars = File::files(public_path('images/avatars'));

        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'role' => 'guest',
            'email' => $data['email'],
            'email_verified_at' => now(),
            'avatar' => 'http://tytsauna.loc:8080/images/avatars/' . $avatars[array_rand($avatars)]->getFilename(),
            'created_at' => now(),
            'blocked' => false,
        ]);
    }

    public function updateUser(User $user, array $data): bool
    {
        $user->fill($data);

        if (!$user->isDirty()) {
            return false;
        }

        return $user->save();
    }
}
