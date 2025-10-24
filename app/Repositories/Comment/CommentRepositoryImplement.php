<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepositoryImplement implements CommentRepository
{
    public function __construct(public Comment $model)
    {
    }

    public function createComment(array $data): Comment
    {
        return $this->model->create($data);
    }
}
