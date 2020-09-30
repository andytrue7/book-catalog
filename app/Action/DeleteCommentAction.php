<?php

namespace App\Action;

use App\Repository\CommentRepository;

final class DeleteCommentAction
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function execute($id)
    {
        $comment = $this->commentRepository->findById($id);

        $comment->delete();
    }
}
