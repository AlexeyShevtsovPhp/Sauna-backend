<?php

namespace App\Repositories\Book;

use Illuminate\Database\Eloquent\Collection;

interface BookRepository
{
    public function getBookingsByDateAndSauna(string $date, int|string $saunaId): Collection;

    public function createBook(array $bookings, int $userId): void;
}
