<?php

namespace App\Action;

use App\Entity\Book;
use App\Entity\Order;
use App\Repository\BookRepository;

final class CreateOrderAction
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute($request, $id)
    {
        $order = new Order();
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');

        $order->save();

        $book = $this->bookRepository->findById($id);

        $order->books()->attach($book->id);
    }
}
