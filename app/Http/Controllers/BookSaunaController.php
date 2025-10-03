<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreBookingRequest;
use App\Models\Book;
use Illuminate\Http\Response;

class BookSaunaController extends Controller
{
    public function book(StoreBookingRequest $request): Response
    {

        $bookings = $request->input('bookings');

        foreach ($bookings as $booking) {
            Book::create($booking);
        }

        return response()->noContent(201);

    }
}
