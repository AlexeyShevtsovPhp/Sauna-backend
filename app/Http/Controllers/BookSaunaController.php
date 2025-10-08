<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreBookingRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookSaunaController extends Controller
{
    public function book(StoreBookingRequest $request): Response
    {
        $user = Auth::user();
        $bookings = $request->input('bookings');

        foreach ($bookings as $booking) {
            $booking['user_id'] = $user->id;
            Book::create($booking);
        }

        return response()->noContent(201);
    }

    public function remove($id): Response | JsonResponse
    {
        Book::find($id)->delete();
        return response()->noContent(200);
    }
}
