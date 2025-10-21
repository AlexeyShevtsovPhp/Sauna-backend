<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Book;
use App\Repositories\Book\BookRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookSaunaController extends Controller
{
    public function __construct(public BookRepository $bookRepository)
    {
    }

    public function book(StoreBookingRequest $storeBookingRequest): Response
    {
        $this->bookRepository->createBook($storeBookingRequest->input('bookings'), Auth::user()->id);
        return response()->noContent();
    }

    public function remove($id): Response | JsonResponse
    {
        Book::find($id)->delete();
        return response()->noContent();
    }
}
