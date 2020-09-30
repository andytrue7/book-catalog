<?php

namespace App\Http\Controllers;

use App\Action\CreateOrderAction;
use App\Entity\Book;
use App\Entity\Order;
use App\Http\Requests\OrderRequest;
use App\Repository\BookRepository;

class OrderController extends Controller
{
    private $createOrderAction;
    private $bookRepository;

    public function __construct(
        CreateOrderAction $createOrderAction,
        BookRepository $bookRepository
    ) {
        $this->createOrderAction = $createOrderAction;
        $this->bookRepository = $bookRepository;
    }

    public function index($id)
    {
        $book = $this->bookRepository->findById($id);
        return view('order.index', compact('book'));
    }

    public function createOrder(OrderRequest $request, $id)
    {
        $this->createOrderAction->execute($request, $id);
        return redirect()->back();
    }
}
