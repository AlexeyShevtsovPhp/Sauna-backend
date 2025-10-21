<?php

declare(strict_types=1);

namespace App\Repositories\Book;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepositoryImplement implements BookRepository
{
    /**
     * @param string $date
     * @param int|string $saunaId
     * @return Collection
     */
    public function getBookingsByDateAndSauna(string $date, int|string $saunaId): Collection
    {
        return Book::where('sauna_id', $saunaId)
            ->whereDate('start_time', $date)
            ->get();
    }
    public function createBook(array $bookings, int $userId): void
    {
        foreach ($bookings as $booking) {
            $booking['user_id'] = $userId;
            Book::create($booking);
        }
    }
}
