<?php

namespace App\Policies;

use App\Entity\Comment;
use App\Entity\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }

    public function view(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Comment $comment)
    {
        //
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

}
