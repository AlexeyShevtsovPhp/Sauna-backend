<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DeleteUserController extends Controller
{
    public function delete(int $userId): Response
    {
        User::find($userId)->delete();
        return response()->noContent();
    }
}


