<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

interface CommentRepository
{
    public function createComment(array $data): Comment;
}
