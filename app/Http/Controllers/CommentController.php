<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Sauna;
use App\Models\User;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct(public CommentRepository $commentRepository)
    {
    }

    public function get($saunaId): AnonymousResourceCollection
    {
        return CommentResource::collection(Sauna::find($saunaId)->comments()->with('user')->paginate(5));
    }

    public function create(CreateCommentRequest $createCommentRequest): Response
    {
        /** @var User $user */
        $user = $createCommentRequest->user();
        $this->commentRepository
            ->createComment(array_merge($createCommentRequest->validated(), ['user_id' => $user->id]));
        return response()->noContent();
    }
}

