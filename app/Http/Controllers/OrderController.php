<?php

namespace App\Http\Controllers;

use App\Entity\Book;
use App\Entity\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        return view('order.index', compact('book'));
    }

    public function createOrder(OrderRequest $request, $id)
    {
        $order = new Order();
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');

        $order->save();

        $book = Book::findOrFail($id);

        $order->books()->attach($book->id);

        return redirect()->back();
    }
}
