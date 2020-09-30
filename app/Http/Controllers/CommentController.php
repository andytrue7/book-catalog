<?php

namespace App\Http\Controllers;

use App\Action\CreateCommentAction;
use App\Action\DeleteCommentAction;
use App\Repository\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   private $createCommentAction;
   private $deleteCommentAction;
   private $commentRepository;

    public function __construct(
        CreateCommentAction $createCommentAction,
        DeleteCommentAction $deleteCommentAction,
        CommentRepository $commentRepository
    ) {
        $this->createCommentAction = $createCommentAction;
        $this->deleteCommentAction = $deleteCommentAction;
        $this->commentRepository = $commentRepository;
    }

    public function createComment(Request $request, $id)
    {
        $this->createCommentAction->execute($request, $id);

        return redirect()->back();
    }

    public function deleteComment($id)
    {
        $comment = $this->commentRepository->findById($id);
        if (request()->user()->can('delete', $comment)) {

            $this->deleteCommentAction->execute($id);
            return redirect()->back();
        }

        return redirect('/catalog');
    }
}
