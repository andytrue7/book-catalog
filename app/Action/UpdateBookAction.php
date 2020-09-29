<?php

namespace App\Action;

use App\Entity\Book;
use App\Http\Requests\BookRequest;
use App\Repository\BookRepository;
use Intervention\Image\ImageManagerStatic as Image;

final class UpdateBookAction
{
    private $bookRepository;

    public function __construct(BookRepository $repository)
    {
        $this->bookRepository = $repository;
    }

    public function execute(BookRequest $request, $id)
    {
        $book = $this->bookRepository->findById($id);

        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->description = $request->get('desc');

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(200, 200);

        $image_resize->save(storage_path('app/public/bookImage/'. $imageName));

        $book->image = $imageName;

        $book->save();
    }
}
