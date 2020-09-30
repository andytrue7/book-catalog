@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/bookImage/'.$book->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description  }}</p>
                        <div class="row justify-content-between">
                            <a href="{{ route('catalog.show', $book->id)  }}" class="btn btn-primary">Show more</a>
                            <a href="#" class="btn btn-primary">Order</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
