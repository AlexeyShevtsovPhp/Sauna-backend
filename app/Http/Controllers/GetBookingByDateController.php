<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\BookingResourceByDate;
use App\Repositories\Book\BookRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GetBookingByDateController extends Controller
{
    public function __construct(public BookRepository $bookRepository)
    {
    }
    public function get(Request $request): JsonResponse
    {
        return response()->json
        (
            BookingResourceByDate::collection($this->bookRepository
                ->getBookingsByDateAndSauna($request->query('date'), $request->query('sauna_id')))
        );
    }
}

