@extends('layouts.app')

@yield('title')

@section('content')
    <div class="container">
        @include('admin.title')
        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title  }}</td>
                            <td>{{ $book->author  }}</td>
                            <td>{{ $book->description  }}</td>
                            <td><img src="{{ asset('storage/bookImage/'.$book->image) }}" alt=""></td>
                            <td>
                                <div class="mb-3">
                                    <a href="{{ route('admin.booklist.edit', $book->id)  }}">
                                        <button class="btn-warning">Edit</button>
                                    </a>
                                </div>
                                <form action="{{ route('admin.booklist.delete', $book->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
