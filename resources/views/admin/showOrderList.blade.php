@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.title')
        <hr>
        <div class="row">
            <h3>Orders</h3>
        </div>
        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Book id</th>
                    <th scope="col">Book title</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->name  }}</td>
                        <td>{{ $order->email  }}</td>
                        <td>{{ $order->phone  }}</td>
                        @foreach($order->books as $book)
                            <td>{{ $book->id  }}</td>
                            <td>{{ $book->title  }}</td>
                        @endforeach

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
