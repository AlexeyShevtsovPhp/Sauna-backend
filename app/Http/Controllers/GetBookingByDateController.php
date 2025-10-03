<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GetBookingByDateController extends Controller
{

    public function get(Request $request)
    {
        $date = $request->query('date');
        $saunaId = $request->query('sauna_id');

        $start = $date . ' 00:00:00';
        $end = $date . ' 23:59:59';

        $bookings = Book::where('sauna_id', $saunaId)
            ->whereBetween('start_time', [$start, $end])
            ->get();

        return response()->json(['bookings' => $bookings]);
    }

}

