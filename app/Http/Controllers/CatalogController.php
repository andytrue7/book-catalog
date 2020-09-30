<?php

namespace App\Http\Controllers;

use App\Repository\BookRepository;

class CatalogController extends Controller
{
    private $bookRepository;

    public function __construct(
        BookRepository  $bookRepository
    ) {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->findLatest();
        return view('catalog.catalog', compact('books'));
    }

    public function showBookPage($id)
    {
        $book = $this->bookRepository->findById($id);

        return view('catalog.show', compact('book'));
    }
}
