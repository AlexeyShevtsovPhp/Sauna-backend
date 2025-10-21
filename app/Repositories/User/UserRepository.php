<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function blockUser(int $userId): bool;
    public function unblockUser(int $userId): bool;

    public function createUser(array $data): User;

    public function updateUser(User $user, array $data): bool;
}
