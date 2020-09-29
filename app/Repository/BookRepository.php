<?php

namespace App\Repository;

use App\Entity\Book;

final class BookRepository
{
    public function findById($id)
    {
        return Book::findOrFail($id);
    }

    public function findLatest()
    {
        return Book::latest()->get();
    }
}
