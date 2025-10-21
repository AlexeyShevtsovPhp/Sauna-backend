<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BlockUserController extends Controller
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public function block(int $userId): Response
    {
        $this->userRepository->blockUser($userId);
        return response()->noContent();
    }

    public function unblock(int $userId): Response
    {
        $this->userRepository->unblockUser($userId);
        return response()->noContent();
    }
}


