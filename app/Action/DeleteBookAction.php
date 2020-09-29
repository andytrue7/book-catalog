<?php

namespace App\Action;

use App\Repository\BookRepository;

final class DeleteBookAction
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute($id)
    {
        $book = $this->bookRepository->findById($id);

        $book->delete();
    }
}
