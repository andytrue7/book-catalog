<?php

namespace App\Http\Controllers\Admin;

use App\Action\CreateBookAction;
use App\Action\DeleteBookAction;
use App\Action\UpdateBookAction;
use App\Entity\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Repository\BookRepository;

class AdminController extends Controller
{
    private $createBookAction;
    private $updateBookAction;
    private $bookRepository;
    private $deleteBookAction;

    public function __construct(
        CreateBookAction $createBookAction,
        BookRepository $repository,
        UpdateBookAction $updateBookAction,
        DeleteBookAction $deleteBookAction
    ) {
        $this->createBookAction = $createBookAction;
        $this->bookRepository = $repository;
        $this->updateBookAction = $updateBookAction;
        $this->deleteBookAction = $deleteBookAction;
    }

    public function index()
    {
        if (request()->user()->can('view', Book::class)) {
            return view('admin.index');
        }

        return redirect('/home');
    }

    public function storeBook(BookRequest $request)
    {
        if (request()->user()->can('create', Book::class)) {
            $this->createBookAction->execute($request);

            return redirect('/admin/dashboard');
        }

        return redirect('/home');
    }

    public function showBookList()
    {
        if (request()->user()->can('view', Book::class)) {
            $books = $this->bookRepository->findLatest();

            return view('admin.showBookList', compact('books'));
        }

        return redirect('/home');
    }

    public function editBook($id)
    {
        if (request()->user()->can('view', Book::class)) {
            $book = $this->bookRepository->findById($id);

            return view('admin.edit', compact('book'));
        }

        return redirect('/home');
    }

    public function updateBook(BookRequest $request, $id)
    {
        if (request()->user()->can('update', Book::class)) {
            $this->updateBookAction->execute($request, $id);

            return redirect()->back();
        }

        return redirect('/home');
    }

    public function deleteBook($id)
    {
        if (request()->user()->can('delete', Book::class)) {
            $this->deleteBookAction->execute($id);

            return redirect()->back();
        }

        return redirect('/home');
    }


}
