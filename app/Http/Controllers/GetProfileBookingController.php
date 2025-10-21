<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\BookingProfileResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class GetProfileBookingController extends Controller
{
    public function get(): JsonResponse
    {
        return BookingProfileResource::collection(Book::with('sauna')
            ->where('user_id', Auth::user()->id)
            ->get())
            ->response();
    }

    public function book4Admin($userId): JsonResponse
    {
        return BookingProfileResource::collection(Book::with('sauna')
            ->where('user_id', $userId)
            ->get())
            ->response();
    }
}


