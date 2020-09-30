<?php

namespace App\Http\Controllers;

use App\Action\CreateOrderAction;
use App\Entity\Book;
use App\Entity\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    private $createOrderAction;

    public function __construct(CreateOrderAction $createOrderAction)
    {
        $this->createOrderAction = $createOrderAction;
    }

    public function index($id)
    {
        $book = Book::findOrFail($id);
        return view('order.index', compact('book'));
    }

    public function createOrder(OrderRequest $request, $id)
    {
        $this->createOrderAction->execute($request, $id);
        return redirect()->back();
    }
}
