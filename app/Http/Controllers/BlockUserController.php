<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BlockUserController extends Controller
{
    public function block(int $userId): Response
    {
        $user = User::find($userId);
        $user->blocked = true;
        $user->save();
        return response()->noContent();
    }

    public function unblock(int $userId): Response
    {
        $user = User::find($userId);
        $user->blocked = false;
        $user->save();
        return response()->noContent();
    }
}


