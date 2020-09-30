<?php

namespace App\Action;

use App\Entity\Comment;
use Illuminate\Support\Facades\Auth;

final class CreateCommentAction
{
    public function execute($request, $id)
    {
        $comment = new Comment();

        $comment->body = $request->get('comment');
        $comment->user_id = Auth::id();
        $comment->book_id = $id;

        $comment->save();
    }
}
