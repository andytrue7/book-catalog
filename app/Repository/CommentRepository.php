<?php

namespace App\Repository;

use App\Entity\Comment;

final class CommentRepository
{
    public function findById($id)
    {
        return Comment::findOrFail($id);
    }

    public function getLatest()
    {
        return Comment::latest()->get();
    }
}
