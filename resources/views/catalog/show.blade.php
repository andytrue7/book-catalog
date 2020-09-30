@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ url('/catalog') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="row justify-content-center">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/bookImage/'.$book->image) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <div class="row">
                                <div class="col-8">

                                </div>
                                <div class="col-4">
                                    <a href="{{ route('order.index', $book->id) }}" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <h3>Comments</h3>
        </div>
            @foreach($book->comments as $comment)
                <div class="row justify-content-center mt-3">
                    <div class="card" style="min-width: 40%">
                        <div class="card-header">
                            {{ $comment->user->name }} commented at {{ $comment->created_at }}
                        </div>
                        <div class="card-body row">
                            <p class="card-text col-9">{{ $comment->body }}</p>
                            <div class="col-3">
                                @can('view', $comment)
                                    <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
             <div class="row justify-content-center mt-3">
                @if(auth()->user())
                    <form class="d-flex" action="{{ route('comment.create', $book->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment" placeholder="Leave your comment">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary ml-3">Send</button>
                        </div>

                    </form>
                @else
                    <p>You have to sign in to comment</p>
                @endif
            </div>

    </div>
@endsection
