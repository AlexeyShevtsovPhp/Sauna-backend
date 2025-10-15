<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserListResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class GetUserListController extends Controller
{
    public function get(): AnonymousResourceCollection
    {
        return UserListResource::collection(User::get());
    }
}


