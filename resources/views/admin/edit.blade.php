@extends('layouts.app')

@section('content')

    <div class="container">
        @include('admin.title')
        <hr>
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit book</h3>
                <a href="{{ route('admin.booklist') }}"><button class="btn btn-secondary">Back</button></a>
            </div>
            <div class="col-8">
                <form method="post" action="{{ route('admin.booklist.update', $book->id)  }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
                    </div>
                    @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" class="form-control" id="desc" name="desc" value="{{  $book->description }}">
                    </div>
                    @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ $book->image  }}">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
