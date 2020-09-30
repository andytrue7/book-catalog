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
                                    <a href="#" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
